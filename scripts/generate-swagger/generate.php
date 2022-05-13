<?php
use FireText\Api;
include __DIR__.'/../../vendor/autoload.php';

$sourcePath = __DIR__.'/../../src/FireText/Api';

$swagger = [
    'swagger' => '2.0',
    'info' => [
        'title' => 'FireText API',
        'description' => 'FireText.co.uk API',
        'termsOfService' => 'https://www.firetext.co.uk/terms',
        'version' => '2',
    ],
    'host' => 'www.firetext.co.uk',
    'basePath' => '/api',
    'schemes' => ['https'],
    'consumes' => ['application/x-www-form-urlencoded'],
    'produces' => ['application/json'],
    'externalDocs' => [
        'description' => 'FireText SMS API Guide',
        'url' => 'https://www.firetext.co.uk/docs',
    ],
    'securityDefinitions' => [
        'apiKey' => [
            'type' => 'apiKey',
            'name' => 'apiKey',
            'in' => 'query',
        ],
        'username' => [
            'type' => 'apiKey',
            'name' => 'username',
            'in' => 'query',
        ],
        'password' => [
            'type' => 'apiKey',
            'name' => 'password',
             'in' => 'query',
         ],
    ],
    'security' => [
        ['apiKey' => []],
        ['username' => [], 'password' => []],
    ],
    'definitions' => [
        'Resource_Base' => [
            'type' => 'object',
        ],
        'Response_Base' => [
            'allOf' => [
                ['$ref' => '#/definitions/Resource_Status' ],
            ],
        ],
        'Response_Count' => [
            'allOf' => [
                ['$ref' => '#/definitions/Response_Base' ],
                [
                    'type' => 'object',
                    'required' => [
                        'responseData',
                    ],
                    'properties' => [
                        'responseData' => [
                            'type' => 'integer',
                        ],
                    ],
                ],
            ],
        ],
        'Response_Resource' => [
            'allOf' => [
                ['$ref' => '#/definitions/Response_Base' ],
                [
                    'type' => 'object',
                    'required' => [
                        'data',
                    ],
                    'properties' => [
                        'data' => [
                            '$ref' => '#/definitions/Resource_Base',
                        ],
                    ],
                ],
            ],
        ],
        'Response_ResourceList' => [
            'allOf' => [
                ['$ref' => '#/definitions/Response_Count' ],
                [
                    'type' => 'object',
                    'required' => [
                        'data',
                    ],
                    'properties' => [
                        'data' => [
                            'type' => 'array',
                            'items' => [
                                '$ref' => '#/definitions/Resource_Base',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'Response_Success' => [
            'allOf' => [
                ['$ref' => '#/definitions/Response_Base' ],
                [
                    'type' => 'object',
                ],
            ],
        ],
    ],
    'paths' => [],
];

// Paths
foreach(glob("{$sourcePath}/Request/*.php") as $requestFile) {
    $className = basename($requestFile, '.php');
    
    if(in_array($className, ["AbstractRequest", "RequestInterface"])) {
        continue;
    }
    
    $requestReflection = new ReflectionClass("FireText\Api\Request\\{$className}");
    
    $requiredParams = [];
    foreach(array_slice($requestReflection->getConstructor()->getParameters(), 1) as $requiredParam) {
        $requiredParams[] = $requiredParam->getName();
    }
    
    $request = $requestReflection->newInstanceArgs(array_merge(array(new Api\Credentials\Login(null, null)), array_fill(0, count($requiredParams), '')));
    $responseType = basename(str_replace('\\', '/', $request->getResponseType()));
    $prop = $requestReflection->getProperty('responseResourceType');
    $prop->setAccessible(true);
    $resourceType = basename(str_replace('\\', '/', $prop->getValue($request)));
    
    $pathKey = "/{$request->getPath()}/json"; // TODO: Try to eliminate the hardcoded format suffixing
    $pathMethod = $request->isPost()?'post':'get';
    $pathSpec = [
        $pathMethod => [
            'responses' => [
                '200' => [
                    'description' => (!empty($resourceType) ? $resourceType : $responseType)." response",
                    'schema' => [
                        '$ref' => "#/definitions/Response_".(!empty($resourceType) ? "ResourceList_{$resourceType}" : $responseType),
                    ],
                ],
            ],
        ],
        "parameters" => [],
    ];
    
    foreach($request->getHydrator()->extract($request) as $name => $value) {
        if(in_array($name, ["isPost", "headers"])) {
            continue;
        }

        $paramSpec = [
            'name' => $name,
            'in' => $request->isPost()?'formData':'query',
            'required' => in_array($name, $requiredParams),
            'type' => 'string', // TODO: Detect this if possible
        ];
    
        $pathSpec['parameters'][] = $paramSpec;
    }
    
    $swagger['paths'][$pathKey] = $pathSpec;
}

// Definitions
# Resources
foreach(glob("{$sourcePath}/Resource/*.php") as $resourceFile) {
    $className = basename($resourceFile, '.php');
    
    if(in_array($className, ["AbstractResource", "ResourceInterface"])) {
        continue;
    }
    
    $resourceReflection = new ReflectionClass("FireText\Api\Resource\\{$className}");
    $resource = $resourceReflection->newInstance();
    
    $resourceKey = "Resource_{$className}";
    $resourceSpec = [
        'type' => 'object',
        'properties' => [],
    ];
    
    foreach($resource->getHydrator()->extract($resource) as $name => $value) {
        if(in_array($name, ["exception"])) {
            continue;
        }
    
        $propSpec = [
            'type' => 'string',
        ];
        
        $resourceSpec['properties'][$name] = $propSpec;
    }
    
    $swagger['definitions'][$resourceKey] = $resourceSpec;

    $resourceList = $swagger['definitions']['Response_ResourceList'];
    $resourceList['allOf'][1]['properties']['data']['items'] = [
        '$ref' => '#/definitions/'.$resourceKey,
    ];
    $swagger['definitions'][str_replace('Resource', 'Response_ResourceList', $resourceKey)] = $resourceList;
}

file_put_contents(empty($argv[1])?__DIR__.'/swagger.json':$argv[1], json_encode($swagger, JSON_PRETTY_PRINT));

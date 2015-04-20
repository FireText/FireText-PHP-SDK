<?php
use FireText\Api;
include __DIR__.'/../../vendor/autoload.php';

$sourcePath = __DIR__.'/../../src/FireText/Api';

$swagger = [
    'swagger' => '2.0',
    'info' => [
        'title' => 'FireText API',
        'description' => 'FireText.co.uk API',
        'termsOfService' => 'https://app.firetext.co.uk/terms/',
        'version' => '2.3',
    ],
    'host' => 'www.firetext.co.uk',
    'basePath' => '/api',
    'schemes' => ['https'],
    'consumes' => ['text/plain; charset=utf-8'],
    'produces' => ['application/json'],
    'externalDocs' => [
        'description' => 'FireText SMS API Guide',
        'url' => 'https://www.firetext.co.uk/docs',
    ],
    'securityDefinitions' => [
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
    'definitions' => [
        'Resource_Base' => [
            'type' => 'object',
        ],
        'Response_Base' => [
            'type' => 'object',
            'required' => [
                'status',
            ],
            'properties' => [
                'status' => [ '$ref' => '#/definitions/Resource_Status', ],
            ],
        ],
        'Response_Count' => [
            'allOf' => [
                ['$ref' => '#/definitions/Response_Base' ],
                [
                    'type' => 'object',
                    'required' => [
                        'count',
                    ],
                    'properties' => [
                        'count' => [
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
                        'item',
                    ],
                    'properties' => [
                        'item' => [
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
                        'items',
                    ],
                    'properties' => [
                        'items' => [
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
    
    $request = $requestReflection->newInstanceArgs(array_merge(array(new Api\Credentials(null, null)), array_fill(0, count($requiredParams), '')));
    $responseType = end(explode('\\', $request->getResponseType()));
    
    $pathKey = "/{$request->getPath()}/json"; // TODO: Try to eliminate the hardcoded format suffixing
    $pathMethod = $request->isPost()?'post':'get';
    $pathSpec = [
        $pathMethod => [
            'responses' => [
                '200' => [
                    'description' => "{$responseType} response",
                    'schema' => [
                        '$ref' => "#/definitions/Response_{$responseType}",
                    ],
                ],
            ],
        ],
        "parameters" => [],
    ];
    
    foreach($request->getHydrator()->extract($request) as $name => $value) {
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
        $propSpec = [
            'type' => 'string',
        ];
        
        $resourceSpec['properties'][$name] = $propSpec;
    }
    
    $swagger['definitions'][$resourceKey] = $resourceSpec;
}

file_put_contents(empty($argv[1])?__DIR__.'/swagger.json':$argv[1], json_encode($swagger, JSON_PRETTY_PRINT));

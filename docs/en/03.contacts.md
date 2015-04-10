## Add a contact
```php
use FireText\Api;
require 'vendor/autoload.php';

$username = 'johndoe@example.com';
$password = 'foo';

$client = new Api\Client(new Api\Credentials($username, $password));

$mobile = '074155992671';

$request = $client->request('Subscribe', $mobile);
$request->setFirstname('John');
$request->setLastname('Doe');

$response = $client->execute($request);
$result = $request->response($response);

if($result->isSuccessful()) {
    echo "Contact successfully added".PHP_EOL;
} else {
    throw $result->getStatus()
        ->getException();
}
```

## Remove a contact
```php
use FireText\Api;
require 'vendor/autoload.php';

$username = 'johndoe@example.com';
$password = 'foo';

$client = new Api\Client(new Api\Credentials($username, $password));

$mobile = '074155992671';

$request = $client->request('Unsubscribe', $mobile);

$response = $client->execute($request);
$result = $request->response($response);

if($result->isSuccessful()) {
    echo "Contact successfully removed".PHP_EOL;
} else {
    throw $result->getStatus()
        ->getException();
}
```

## View a contact
```php
use FireText\Api;
require 'vendor/autoload.php';

$username = 'johndoe@example.com';
$password = 'foo';

$client = new Api\Client(new Api\Credentials($username, $password));

$mobile = '074155992671';

$request = $client->request('ContactInfo', $mobile);

$response = $client->execute($request);
$result = $request->response($response);

if($result->isSuccessful()) {
    $contactInfo = $result->getResource()->getHydrator()
        ->extract($result->getResource());
    foreach($contactInfo as $field => $value) {
        echo "{$field}: {$value}".PHP_EOL;
    }
} else {
    throw $result->getStatus()
        ->getException();
}
```

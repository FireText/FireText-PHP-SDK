## Add a group
```php
use FireText\Api;
require 'vendor/autoload.php';

$username = 'johndoe@example.com';
$password = 'foo';

$client = new Api\Client(new Api\Credentials($username, $password));

$name = 'My New Group';
$description = 'My new fantabulous group';
$from = 'My Sender ID';

$request = $client->request('AddGroup', $name, $description, $from);

$response = $client->execute($request);
$result = $request->response($response);

if($result->isSuccessful()) {
    echo "Group added successfully".PHP_EOL;
} else {
    throw $result->getStatus()
        ->getException();
}
```

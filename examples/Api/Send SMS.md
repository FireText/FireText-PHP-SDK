```php
use FireText\Api;
require 'vendor/autoload.php';

$username = 'johndoe@example.com';
$password = 'foo';

$client = new Api\Client(new Api\Credentials($username, $password));

$message = 'FireText is outstanding and really easy to use!';
$from = '074155992671';
$to = array(
    '074155992671'
);

$request = $client->request('SendSms', $message, $from, $to);

$response = $client->execute($request);
$result = $request->response($response);

if($result->isSuccessful()) {
    echo "Sent {$result->getCount()} messages".PHP_EOL;
} else {
    throw $result->getStatus()
        ->getException();
}
```

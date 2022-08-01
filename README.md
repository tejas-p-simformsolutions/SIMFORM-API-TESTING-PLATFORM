# SIMFORM API TESTING PLATFORM (PHP)

### Introduction
---
The SIMFORM API TESTING PLATFORM is a PHP7.x supported light weight, simple package implemented with the OOPS concepts to make the API request. It supports different HTTP requests like  'GET', 'POST', 'PUT', 'PATCH','OPTIONS','DELETE' . The package also handles an exception if the requested URL returned any error or is invalid or has malformed JSON response. The package by default uses the singleton instance behaviour which can be configured as per the need.

### Installation.

- Go to the directory where copy of the project is available  

- Open an URL like "http://IP_ADDRESS or localhost/simform-api-testing-platform/src/demo" to access and test the    application. 


### Usage 
---
The following code snippet can be used for the simple get request.
```php
require_once '../autoload.php';

use App\Http\Request;

// By default the class will have only one instance
// Pass the argument `$createNew = true` to always get the new instance
$request = Request::getInstance();
$response = $request->get('https://api-endpoint-url/');
$result = $response->getResponseBody();
```

#### List OF Supported Methods
---
```php

1 GET
2 POST
3 PUT
4 PATCH
5 DELETE
6 OPTIONS

```

#### Examples 
---
**Example 1**: Make a `GET` request
```php
$request = Request::getInstance();//create Instance For Send Request
$response = $request->get('https://api-endpoint-url/');
$result = $response->getResponseBody(); // Response for Send Request
```
**Example 2**: Make a `POST` request
```php
$payload = [
    'key' => 'value',
];
$request = Request::getInstance();//create Instance For Send Request
$response = $request->post('https://api-endpoint-url/', $payload);// Send Request With Required Data In Body
$result = $response->getResponseBody(); // Response for Send Request
```
**Example 2**: Pass custom headers(If required For any Request like Authorization Token)
```php
$payload = [
    'key' => 'value',
];

$headers = [
    'Authorization' => 'Bearer auth_token'
];

$request = Request::getInstance();
$response = $request->post('https://api-endpoint-url/', $payload, $headers);//Add Another Parameter as Header for Send Header with Request
$result = $response->getResponseBody();
```

#### Author
- [Tejas Prajapati](https://github.com/tejas-p-simformsolutions)

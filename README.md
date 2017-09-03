# laravel-service-utils

This tool adds some utilities for internal services in [Laravel](https://laravel.com/).

Using this package, you could extend all your services (classes with the application business logic) from `Diegoalvarezb\ServiceUtils\AbstractService` and use some funcionalities:
- Service response interface
- Log management

### Requirements

- PHP >= 5.6
- Laravel >= 5.0

### Installation and configuration

Package installation with composer:
```
composer require diegoalvarezb/laravel-service-utils
```

And add the service provider in your `config/app.php` file:
```php
Diegoalvarezb\FrontMessages\ServiceUtilsServiceProvider::class
```

And this command will add the service-utils config file to the laravel config folder:
```sh
php artisan vendor:publish --tag=service-utils
```

### Service response interface

Use the next command to return the result of a method:

```php
return $this->generateResponse($data = [], $errorCode = 'NO_ERROR', $message = '');
```

The first param contains an array with all data.
The second one must be the error code (this one must exists in the service-utils config file).
The third one an additional message (if you don't send this param, the corresponding in the config file will be selected).

This method will return a `ServiceResponse` object, wich has the next methods:
- hasErrors()
- isCritical()
- getMessage()
- getData()
- getHttpCode()

### Service log management

Use the next command to write info the log file:

```php
$this->logException($exception, $type = 'error', $customMessage = '');
```

The first param contains the exception.
The second one must be the log type.
The third one an additional message.

The list of log types:
- error
- emergency
- alert
- critical
- warning
- notice
- info

The structure of the log:
[datetime] local.LOG_TYPE: Path\To\Class  |  method()  |  (Exception)   |    message

### Example config file: service-utils.php

```php
<?php

use Symfony\Component\HttpFoundation\Response;

return [

    /*
     * Error code list for service response interface.
     */
    'service_codes' => [

        'NOT_ERROR' => [
            'is_error' => false,
            'message' => 'Ok.',
            'http_code' => Response::HTTP_OK,
            'is_critial' => false,
        ],

        'GENERAL_ERROR' => [
            'is_error' => true,
            'message' => 'General error.',
            'http_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'is_critial' => false,
        ],

        'NEW_ERROR' => [
            'is_error' => true,
            'message' => 'Text example of a new error.',
            'http_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'is_critial' => true,
        ],

    ],

];
```

### License

MIT

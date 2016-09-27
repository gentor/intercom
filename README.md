Intercom
===============

Wrapper on the Intercom class provided by Intercom - with custom methods and support for Laravel 5.x

Installation
------------

Installation using composer:

```
composer require gentor/intercom
```


And add the service provider in `config/app.php`:

```php
Gentor\Intercom\IntercomServiceProvider::class,
```

Configuration
-------------

Change your default settings in `app/config/intercom.php`:

```php
<?php
return [
    'app_id' => env('INTERCOM_APP_ID', '****'),
    'api_key' => env('INTERCOM_API_KEY', '********'),
];
```


Documentation
-------------

[Intercom API](https://github.com/intercom/intercom-php)


# Site Protection Package for Laravel
- [Site Protection Package for Laravel](#site-protection-package-for-laravel)
  - [Installation](#installation)
  - [Service Provider](#service-provider)
  - [Config](#config)
  - [Kernel](#kernel)
  - [Environment](#environment)

## Installation
To include the package in your project, Please run following command.
```
Coming soon
```
## Service Provider
In your `config/app.php` add the following Service Providers to the end of the providers array:
```php
'providers' => [
    ...
    VCComponent\Laravel\Site\Providers\SiteProtectionServiceProvider::class,
],
```
## Config
Run the following commands to publish `config/site-protection.php` and `resources/sass/protection/_protection.scss` files.
```
php artisan vendor:publish 
```
You can change default account and password in `config/site-protection.php`. 
```php
'custom_or_default' => [

    'account'  => env('ACCOUNT_SITE_PROTECTION', "default account"),

    'password' => env('PASSWORD_SITE_PROTECTION', "default_password"),

],
```
## Kernel
If you want to display error messages when users enter invalid account, you need to edit in `kernel.php` file.
```php
protected $middleware = [
    ...
    \Illuminate\Session\Middleware\StartSession::class,
];
```
## Environment
In `.env` file, we need some configuration. We can enter account and password in the variables `ACCOUNT_SITE_PROTECTION` and `PASSWORD_SITE_PROTECTION`. 
```
SITE_PROTECTION=true

ACCOUNT_SITE_PROTECTION=your_account

PASSWORD_SITE_PROTECTION=your_password
```


<p align="center">
<a href="https://travis-ci.org/shahafan/laravel-in-production"><img src="https://travis-ci.org/shahafan/laravel-in-production.svg" alt="Build Status"></a>
</p>

## Laravel-Israel #4 Meetup - Laravel in Production

What's in it? So basically it is a fork of [laravel](https://github.com/laravel/laravel) with some support for production, such as:

- [Deployer](https://deployer.org).
- [Sentry](https://sentry.io).
- [Log Viewer](https://github.com/rap2hpoutre/laravel-log-viewer).
- [Travis CI](https://travis-ci.org).
- [Bitbucket Pipelines](https://bitbucket.org/product/features/pipelines).

## Deploy to Server
[How To Deploy a Laravel Application with Nginx on Ubuntu 16.04](https://www.digitalocean.com/community/tutorials/how-to-deploy-a-laravel-application-with-nginx-on-ubuntu-16-04)

## Installation
### Deployer
```bash
$ composer require deployer/deployer --dev
$ composer require deployer/recipes --dev
$ php vendor/bin/dep init
$ php vendor/bin/dep deploy
```

### Sentry
```bash
$ composer require sentry/sentry-laravel
```
Add Sentry reporting to ``app/Exceptions/Handler.php``:
```php
public function report(Exception $exception)
{
    // report to Sentry
    if (App::environment('production') && $this->shouldReport($exception)) {
      app('sentry')->captureException($exception);
    }

    parent::report($exception);
}
Add your DSN to ``.env``:
```
SENTRY_DSN=https://public:secret@sentry.example.com/1

### Log Viewer
```bash
$ composer require rap2hpoutre/laravel-log-viewer
```
Add a route in your web routes file:
```php 
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
```

### Travis CI
Create [.travis.yml](../blob/master/.travis.yml) and [.env.travis](../blob/master/.env.travis) files

### Bitbucket Pipelines
Create [bitbucket-pipelines.yml](../blob/master/bitbucket-pipelines.yml) file 
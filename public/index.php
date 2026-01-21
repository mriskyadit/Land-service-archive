<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Laravel - A PHP Framework For Web Artisans
|--------------------------------------------------------------------------
|
| This file is the entry point for all requests to the application.
| It bootstraps the framework and handles the incoming request.
|
*/

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance mode, load the maintenance file.
|
*/
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Composer Autoloader
|--------------------------------------------------------------------------
|
| This loads all the dependencies installed via Composer.
|
*/
require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Bootstrap the Laravel application and handle the incoming request.
|
*/

/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

/** @var \Illuminate\Contracts\Http\Kernel $kernel */
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Request::capture();
$response = $kernel->handle($request);

$response->send();

$kernel->terminate($request, $response);

<?php

$origin='*';
if (array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $origin = $_SERVER['HTTP_ORIGIN'];
}
elseif (array_key_exists('HTTP_REFERER', $_SERVER)) {
    $origin = $_SERVER['HTTP_REFERER'];
} elseif (array_key_exists('REMOTE_ADDR', $_SERVER)) {
    $origin = $_SERVER['REMOTE_ADDR'];
}

//var_dump($origin);
//header('Access-Control-Allow-Origin: https://www.o3erp.com');
//header('Access-Control-Allow-Origin: https://localhost:3000');
header('Access-Control-Allow-Origin: '.$origin);
header('Access-Control-Allow-Methods: *');
//header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Headers: MS-APP-ID,MS-APP-Token,X-XSRF-TOKEN,x-requested-with,x-csrf-token,content-type,access-control-allow-origin,access-control-allow-headers');
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Credentials: true");

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/
//phpinfo();
//dd();
$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/
return $app;


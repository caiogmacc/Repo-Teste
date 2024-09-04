<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determina se o aplicativo está em modo de manutenção
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Registra o autoloader do Composer...
require __DIR__.'/../vendor/autoload.php';

// Inicializa o Laravel e trate da solicitação ...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());

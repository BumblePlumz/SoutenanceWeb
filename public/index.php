<?php
namespace App\public;

use App\Autoloader;
use App\Core\Router;

$env = "prod";

// On définie une constance contenant le dossier racine du projet
if ($env === "dev"){
    define('ROOT', dirname(__DIR__));
    define('BASE_URL', "/public/");
    define('ASSETS_PATH', BASE_URL . 'assets/');
    define('VIEW_PATH', '/SoutenanceWeb/Views/');
}
if ($env === "prod"){
    define('ROOT', dirname(__DIR__));
    
    define('BASE_URL', './');
    define('ASSETS_PATH', BASE_URL . 'assets/');
    define('VIEW_PATH', './Views/');
}


// On importe l'autoloader
require_once ROOT.'/Autoloader.php';
Autoloader::register();

// On va instancier Router (notre routeur)
$app = new Router();

// On démarre l'application
$app->start();
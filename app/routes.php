<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/config/config.php';

use App\Controllers\Controller;
use App\Models\Model;
use App\Helper\Helper;
use App\Config\Config;
use App\Config\Database;

$config = Config::getDatabaseConfig();
$useDatabase = $config['use_database'];

if ($useDatabase) {
    $db = new Database($config);
    $db->connect();
}

$routes = array(
    '/' => 'Controller@index',
    // Add other routes here.
);

function getCurrentUrl() {
    return isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
}

function matchRoute($routes, $url) {
    if (isset($routes[$url])) {
        return $routes[$url];
    }
    return 'NotFound@index';
}

function handleRoute($routes, $helper, $model) {
    $currentUrl = getCurrentUrl();
    list($controllerName, $methodName) = explode('@', matchRoute($routes, $currentUrl));
    $controllerName = 'App\Controllers\\' . $controllerName;

    if (!class_exists($controllerName)) {
        $controllerName = 'App\Controllers\NotFound';
        $methodName = 'index';
    }

    $controller = new $controllerName($helper, $model);
    $controller->$methodName();
}

handleRoute($routes, new Helper(), new Model());
?>

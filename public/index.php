<?php
declare (strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Database\Database;
use App\App;
use App\Controller\Product\ProductController;
use App\Controller\Product\ProductGateway;
use App\Core\Database\DatabaseMysqlConnection;


set_error_handler("App\Core\Errors\ErrorHandler::handleError");
set_exception_handler("App\Core\Errors\ErrorHandler::handleException");

header("Content-type: application/json; charset=UTF-8");

$parts = explode('/', $_SERVER['REQUEST_URI']);

if ($parts[1] != "products"){
    http_response_code(404);
    exit;
}

$id = $parts[2] ?? null;

$mysqlConnection = DatabaseMysqlConnection::getInstance();

$db = new Database($mysqlConnection);

$gateway = new ProductGateway($db);

$products = new ProductController($gateway);

$products->processRequest($_SERVER['REQUEST_METHOD'], $id);




// типо класс Database




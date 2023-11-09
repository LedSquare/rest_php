<?php
declare (strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
  
use App\App;
use App\Controller\Product\ProductController;

header("Content-type: application/json; charset=UTF-8");

$parts = explode('/', $_SERVER['REQUEST_URI']);

if ($parts[1] != "products"){
    http_response_code(404);
    exit;
}

$id = $parts[2] ?? null;

$products = new ProductController();

$products->processRequest($_SERVER['REQUEST_METHOD'], $id);
// App::run();


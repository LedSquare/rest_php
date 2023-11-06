<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\App;

echo 'hello docker php!!!' . '<br>';

App::run();

dd($_ENV[]);
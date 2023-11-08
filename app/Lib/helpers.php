<?php


ini_set('display_errors', 1);

error_reporting(E_ALL);

if (! function_exists('dd')){
    function dd($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        exit;
    }
}

if (! function_exists('dump')){
    function dump($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}
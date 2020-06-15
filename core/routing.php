<?php

// Based on https://www.taniarascia.com/the-simplest-php-router/

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        break;
    case '' :
        break;
    case '/portfolio' :
        require __DIR__ . 'index.php/#portfolio';
        break;
    case '/about' :
        require __DIR__ . 'index.php/#about';
        break;
    case '/contact' :
        require __DIR__ . 'index.php/#contact';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
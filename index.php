<?php
/*
TODO: Get rid of Bootstrap
TODO: Get rid of jQuery
TODO: SRCSET for portfolio thumbnails
TODO: "Featured" category as default for Portfolio, to limit total payload on first load
TODO: image traversal ( <-- PREV and NEXT --> ) for lightbox
TODO: 404 view
*/

// Routing, based on https://www.taniarascia.com/the-simplest-php-router/
$request = $_SERVER['REQUEST_URI'];
$host = $_SERVER['HTTP_HOST'];
switch ($request) {
    case '/' :
    case '' :
        require __DIR__ . '/views/home.php';
        break;
    case '/portfolio' :
        header("Location: /#portfolio");
        break;
    case '/about' :
        header("Location: /#about");
        break;
    case '/contact' :
        header("Location: /#contact");
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}

?>

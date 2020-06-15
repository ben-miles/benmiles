<?php
/*
TODO: linkify the animated list items to portfolio subsections?
TODO: work/edu timelines? d3.js + gantt chart: https://github.com/dk8996/Gantt-Chart
TODO: SVG logo?
TODO: normalize gallery item heights to prevent big gaps?
TODO: Scrollspy for main nav?
TODO: SEO
TODO: image traversal ( <-- PREV and NEXT --> ) for lightbox
TODO: multiple image support for lightbox
    TODO: make gallery thumbnails and modal display images as backgrounds for better centering/scaling. set heights/widths as needed
    TODO: Add captions to detail images
*/
// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';

// die();

// Routing, based on https://www.taniarascia.com/the-simplest-php-router/
$request = $_SERVER['REQUEST_URI'];
$host = $_SERVER['HTTP_HOST'];
switch ($request) {
    case '/' :
        require __DIR__ . '/views/home.php';
        break;
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

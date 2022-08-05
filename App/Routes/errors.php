<?php

/**
 * ERROR HANDLERS
 */

// Custom 404 Handler
$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo '404, route not found!';
});

// custom 404
$router->set404('/test(/.*)?', function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo '<h1><mark>404, route not found!</mark></h1>';
});

$router->set404('/api(/.*)?', function() {
    header('HTTP/1.1 404 Not Found');
    header('Content-Type: application/json');

    $jsonArray = array();
    $jsonArray['status'] = "404";
    $jsonArray['status_text'] = "route not defined";

    echo json_encode($jsonArray);
});
<?php

// Before Router Middleware
$router->before('GET', '/.*', function () {
    header('X-Powered-By: bramus/router');
});
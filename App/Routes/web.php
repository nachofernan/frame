<?php

// Namespace donde se manejan todas las rutas WEB
$router->setNamespace('App\Controllers');

// Ruta inicial sin absolutamente nada
$router->get('/', function () {
    header("Location: ./home");
});

// Rutas del HOME
$router->get('/home', 'Home@index');
$router->get('/login', 'Home@login');
$router->get('/logout', 'Home@logout');
$router->get('/register', 'Home@register');

// Post del Login
$router->post('/login', function () {
    $userModel = new \App\Models\UserModel();
    $datos = json_decode(file_get_contents('php://input'),true);
    $user = $userModel->check($datos['email'], $datos['password']);
    header('Content-Type: application/json');
    $jsonArray = array();
    if($user) { 
        $_SESSION['auth'] = true;
        $_SESSION['user'] = $user;
        $jsonArray['auth'] = true;
    } else {
        $jsonArray['auth'] = false;
    }
    echo json_encode($jsonArray);
});

// POST del Register
$router->post('/register', function () {
    $userModel = new \App\Models\UserModel();
    $datos = json_decode(file_get_contents('php://input'),true);
    $register = $userModel->store($datos['email'], $datos['username'], $datos['password']);
    header('Content-Type: application/json');
    $jsonArray = array();
    if($register) { 
        $jsonArray['auth'] = true;
    } else {
        $jsonArray['auth'] = false;
    }
    echo json_encode($jsonArray);
});

/* 
// Rutas del post individual
$router->get('/post(/\d+)', 'Post@show');
$router->get('/p(/\d+)', 'Post@show');

// GET, POST y PUT del nuevo post
$router->get('/new-post', 'Post@create');
$router->post('/new-post', 'Post@store');
$router->put('/new-post', 'Post@update');

// GET y PUT de la edicion
$router->get('/post(/\d+)/edit', 'Post@edit');
$router->put('/post(/\d+)/edit', 'Post@update');

// Rutas del User-Post
$router->get('/posts/user(/\d+)', 'Post@byUser'); 
*/
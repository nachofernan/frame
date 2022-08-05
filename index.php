<?php

    session_start();

    // Autoloader de PHP General
    spl_autoload_register(function ($class) {
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
        if (file_exists($file)) {
            require $file;
            return true;
        }
        return false;
    });

    // Autoloader de las librerías de Composer
    require './vendor/autoload.php';

    // Tomando las variables estáticas en el .env
    $dotenv = new \Symfony\Component\Dotenv\Dotenv();
    $dotenv->load(__DIR__.'/.env');

    // Creando un enrutador
    $router = new \Bramus\Router\Router();

    // Llamando a las rutas (agregar o sacar en App/Routes/web.php)
    require './App/Config/Routes.php';
    
    // Iniciar el enrutador.
    $router->run();

// EOF



<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Config\View;
use App\Config\Util;

class Home
{
    public function index()
    {
        $views = ['home/index'];
        $args  = [
            'title' => 'Home',
        ];
        View::render($views, $args);
    }

    public function error_404()
    {
        http_response_code(404);
        View::render(['error/404']);
    }

    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['email'] && $_POST['password'] && (!isset($_SESSION['auth']) || !$_SESSION['auth'])) {
            $user = new UserModel();
            if($user->check($_POST['email'], $_POST['password'])) {
                header("Location: " . Util::baseUrl() . 'home');
                exit();
            }
        } 
        if(isset($_SESSION['auth']) && $_SESSION['auth']) {
            header("Location: " . Util::baseUrl() . 'home');
        }

        $views = ['home/login'];
        $args  = [
            'title' => 'Ingresar',
            'js' => 'login',
        ];

        View::render($views, $args);
    }

    public function logout()
    {
        session_destroy();
        header("Location: " . Util::baseUrl() . 'home'); 
    }

    public function register() {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['email'] && $_POST['username'] && $_POST['password'] && (!isset($_SESSION['auth']) || !$_SESSION['auth'])) {
            $user = new UserModel();
            if($user->store($_POST['email'], $_POST['username'], $_POST['password'])) {
                header("Location: " . Util::baseUrl() . "Log/in");
            }
        } 
        if(isset($_SESSION['auth']) && $_SESSION['auth']) {
            header("Location: " . Util::baseUrl());
        }

        $views = ['home/register'];
        $args  = [
            'title' => 'Registrarse',
            'js' => 'register',
        ];

        View::render($views, $args);
    }
    
}

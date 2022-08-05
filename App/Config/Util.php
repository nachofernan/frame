<?php

namespace App\Config;

class Util
{
    public static function baseUrl()
    {
        $baseUrl = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https' : 'http');
        $baseUrl .= '://'.$_SERVER['HTTP_HOST'];
        $baseUrl .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        //$baseUrl = str_replace('/', '', $baseUrl);
        return $baseUrl;
    }

    public static function hasAuth() {
        if(isset($_SESSION['auth']) && $_SESSION['auth']) {
            return true;
        }
        return false;
    }
}

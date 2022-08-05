<?php

namespace App\Config;

use Exception;

class View
{
    public static function render($views = [], $args = [], $header = 'templates/header', $footer = 'templates/footer')
    {
        $baseUrl = Util::baseUrl();
        $auth = Util::hasAuth();
        extract($args, EXTR_SKIP);

        $file = Config::VIEWS."$header.php";
        if (is_readable($file)) {
            require $file;
        } else {
            throw new Exception("$file not found");
        }

        foreach ($views as $view) {
            $file = Config::VIEWS."$view.php";

            if (is_readable($file)) {
                require $file;
            } else {
                throw new Exception("$file not found");
            }
        }

        $file = Config::VIEWS."$footer.php";
        if (is_readable($file)) {
            require $file;
        } else {
            throw new Exception("$file not found");
        }
        exit;
    }

    public static function renderJson($data, $code = 200, $charset = 'utf-8')
    {
        $response = json_encode($data);
        http_response_code($code);
        header("Content-type: application/json; charset=".$charset);
        echo $response;
        exit;
    }
}

<?php

namespace App\Middlewars;

use Php22\http\Middleware\MiddlewareInterface;


class AuthMiddleware
{
    public function handle($params)
    {
        // debug(1);


        
        // Authentication logic
        // if (!isset($_SESSION['user'])) {
        //     header('Location: /login');
        //     exit;
        // }
    }
}

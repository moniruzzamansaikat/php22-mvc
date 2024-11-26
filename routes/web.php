<?php

use App\Middlewars\AuthMiddleware;

router()->setControllerNamespace('App\Controllers');

router()->prefix('')->middleware([AuthMiddleware::class])->group(function () {
    router()->controller('HomeController')->get('/', 'index', 'home');

    router()->controller('UserController')->prefix('users')->group(function () {
        router()->get('/', 'index', 'user.get');
        router()->get('/{id}/delete', 'deleteUser', 'user.delete');
        router()->get('/json', 'getJson', 'user.json');
        router()->post('/', 'store', 'user.store');
    });
});

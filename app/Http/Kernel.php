<?php
namespace App\Http\Middleware;

protected $routeMiddleware = [
    // ...
    'isAdmin' => \App\Http\Middleware\IsAdmin::class,
];

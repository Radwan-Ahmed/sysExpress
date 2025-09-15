<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
   protected function redirectTo($request)
{
    if (!$request->expectsJson()) {
        // Check if the guard is admin
        if ($request->is('admin') || $request->is('admin/*')) {
            return route('admin.login'); // redirect to admin login
        }

        return route('login'); // default user login
    }
}

}

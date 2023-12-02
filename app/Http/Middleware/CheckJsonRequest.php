<?php
namespace App\Http\Middleware;

use Closure;

class CheckJsonRequest
{
    public function handle($request, Closure $next)
    {
        if (!$request->expectsJson()) {
            if ($request->is('admin/*')) {
                return redirect()->route('admin.login');
            } else {
                return redirect()->route('login');
            }
        }

        return $next($request);
    }
}
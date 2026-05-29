<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidarAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (session('rol') !== 'Administrador') {
            return redirect('/dashboard');
        }
        return $next($request);
    }
}

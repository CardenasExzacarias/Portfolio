<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->validate([
            'name' => 'required',
            'pass' => 'required'
        ], [
            'name.required' => 'El nombre es requerido',
            'pass.required' => 'La contraseña es requerida'
        ]);
        
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(isset($_GET['name'])){
            $name = $_GET['name'];
            $pass = $_GET['pass'];
        }else{
            $name = $_POST['name'];
            $pass = $_POST['pass'];
        }

        $result = User::get($name, $pass);

        if (count($result) != 0) {
            return $next($request);
        }

        $noUser = "Usuario o contraseña incorrectos";

        return redirect('/')->with('noUser', $noUser);
    }
}

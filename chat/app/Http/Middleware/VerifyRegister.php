<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyRegister
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
        }

        $result = User::get($name, $pass);

        if(count($result) == 0){
            return $next($request);
        }

        $user = "Ususario existente";

        return redirect('/register')->with('user', $user);
    }
}

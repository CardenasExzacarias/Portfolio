<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $name = "";
    private $pass = "";
    private $email = "";

    public function index()
    {
        return (session('user')) ? redirect('home') : view('login.login');
    }

    public function login()
    {
        if($this->name == ""){
            $this->name = $_GET['name'];
            $this->pass = $_GET['pass'];
        }

        $result = User::get($this->name, $this->pass);

        if (count($result) != 0) {
            $json = json_encode($result[0]);
            session(['user' => json_decode($json, true)]);
        }

        return redirect('home');
    }

    public function register()
    {
        return view('login.register');
    }

    public function registerUser()
    {
        $this->name = $_POST['name'];
        $this->pass = $_POST['pass'];
        $this->email = $_POST['email'];

        User::register($this->name, $this->pass, $this->email);

        return $this->login();
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }

    public function search()
    {
        $user = $_GET['user'];

        $users = User::getUsers($user);

        return response(view("search", compact('users')), 200);
    }
}
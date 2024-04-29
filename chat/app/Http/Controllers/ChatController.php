<?php

namespace App\Http\Controllers;

class ChatController extends Controller
{
    public function index()
    {
        GeneralController::update();

        return view('home');
    }

    public function contacts()
    {
        GeneralController::update();

        $array = [];

        foreach (session('friends') as $friend) {
            $array[] = [
                'friend',
                view('layouts.chat.last', compact('friend'))->render()
            ];
        }

        foreach (session('users') as $friend) {
            if (!in_array($friend, session('friends'))) {
                $array[] = [
                    'direct',
                    view('layouts.chat.last', compact('friend'))->render()
                ];
            }
        }

        return response(json_encode($array, JSON_FORCE_OBJECT), 200);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Messages;
use App\Models\Notifications;
use App\Models\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function get($id, Request $request)
    {
        if (!session('user')) {
            return Redirect('');
        }

        $name = "";

        $conversation = Conversation::get(
            session('user')['id'],
            $id
        );

        foreach ($conversation as $message) {
            if ($message->name != session('user')['name']) {
                $name = $message->name;
                break;
            }
        }

        if($name == ""){
            $name = User::getUser($id)[0][0];
        }

        session(['conversation' => [$conversation, $id, $name]]);

        if ($request->ajax()) {
            return view('layouts.chat.master');
        } else {
            GeneralController::update();
            return view('homeLoaded');
        }
    }

    public function send()
    {
        Messages::send(
            $_POST['user'],
            $_POST['message'],
            session('user')['id'],
            $_POST['date']
        );

        Notifications::add(
            session('user')['id'],
            $_POST['user']
        );

        $data = [
            'name' => session('user')['name'],
            'created_at' => $_POST['date'],
            'message' => $_POST['message'],
            'id' => $_POST['user']
        ];

        return response(
            view(
                'layouts.chat.message',
                compact('data')
            ),
            201
        );
    }

    public function update()
    {
        $data = [
            'name' => $_POST['name'],
            'date' => $_POST['date'],
            'message' => $_POST['message'],
            'href' => $_POST['href']
        ];

        return response(
            view(
                'layouts.chat.last',
                compact('data')
            ),
            201
        );
    }

    public function unseen($user)
    {
        $lasts = Conversation::getLasts(
            $user,
            session('user')['id']
        );
        
        $var = [];

        foreach ($lasts as $message) {
            $data = json_decode(
                json_encode($message, true),
                true
            );

            $var[] = view(
                'layouts.chat.message',
                compact('data')
            )->render();
        }

        $var = json_encode($var, JSON_FORCE_OBJECT);

        return $var;
    }
}

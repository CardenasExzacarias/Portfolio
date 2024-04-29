<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\Notifications;

class NotificationController extends Controller
{
    public static function get()
    {
        GeneralController::update();
        
        return response(
            view('layouts.contacts.contacts')->render(),
            200
        );
    }

    public static function seen($post)
    {
        Notifications::seen(
            $post,
            session('user')['id']
        );

        Messages::changeStatus($post);

        return response(null, 204);
    }
}

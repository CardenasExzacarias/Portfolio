<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Friends;
use App\Models\Messages;
use App\Models\Notifications;

class GeneralController extends Controller
{
    public static function update()
    {
        $id = session('user')['id'];

        //Obtener ultimos mensajes de amigos y conversaciones directas
        $users = static::getLasts(Conversation::getUsers($id), $id);

        $friends = static::getLasts(Friends::getFriends($id), $id);

        //Obtener la lista de notificaciones
        $notifications = static::getNotifications(Notifications::get($id));

        session(['friends' => $friends]);
        session(['users' => $users]);
        session(['notifications' => $notifications]);
    }

    private static function getLasts($elements, $id)
    {
        foreach ($elements as $element) {
            $position = array_search($element, $elements);
            $last = Conversation::getLast($element[1], $id);
            if(!empty($last)){
                $elements[$position][] = $last[0];
                $elements[$position][] = $last[1];
            }
        }

        uasort($elements, function ($a, $b) {
            if(count($a) > 2 && count($b) > 2){
                $a = strtotime($a[3]);
                $b = strtotime($b[3]);
            }else{
                return - 1;
            }

            if ($a > $b) {
                return - 1;
            } else {
                return + 1;
            }
        });

        return $elements;
    }

    private static function getNotifications($list)
    {
        $unseen = [];
        $count = 0;

        foreach ($list as $element) {
            $message = Messages::Unseen($element->id_post);
            $count = count($message);
            $message = $message[0];
            $message->href = secure_url("home/$element->id_post");
            $message->count = $count;
            if (!in_array($message, $unseen)) {
                $unseen[] = $message;
            }
        }

        return $unseen;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Conversation extends Model
{
    use HasFactory;

    protected $table = 'conversation';

    public static function getedMessages($id): array{
        return DB::select(
            "SELECT DISTINCT u.name, c.get_id
            FROM conversation as c
            INNER JOIN user as u
            ON c.get_id = u.id
            WHERE post_id = :id;",
            ['id' => $id]
        );
    }

    public static function postedMessages($id): array{
        return DB::select(
            "SELECT DISTINCT u.name, c.post_id
            FROM conversation as c
            INNER JOIN user as u
            ON c.post_id = u.id
            WHERE get_id = :id;",
            ['id' => $id]
        );
    }

    public static function getUsers($id): array{
        $usersP = Conversation::getedMessages($id);

        $usersG = Conversation::postedMessages($id);

        return Functions::mergeArrays($usersP, $usersG);
    }

    public static function get($send, $get): array{
        return DB::select(
            "SELECT m.message, u.name, m.created_at, m.id
            FROM messages as m
            INNER JOIN conversation as c
            ON m.id = c.messages_id
            INNER JOIN user as u
            ON u.id = c.post_id
            WHERE (
                c.get_id = :gidG OR
                c.get_id = :gidP
            )
            AND (
                c.post_id = :pidG OR
                c.post_id = :pidP
            )
            ORDER BY c.id DESC LIMIT 50;",
            [
                'gidG' => $get,
                'gidP' => $send,
                'pidG' => $get,
                'pidP' => $send
            ]
        );
    }

    public static function getLast($send, $get): array{
        $last = DB::select(
            "SELECT message, created_at
            FROM messages AS m
            INNER JOIN conversation AS c
            ON m.id = c.messages_id
            WHERE (
                c.get_id = :gidG OR
                c.get_id = :gidP
            )
            AND (
                c.post_id = :pidG OR
                c.post_id = :pidP
            )
            ORDER BY c.id DESC LIMIT 1;",
            [
                'gidG' => $get,
                'gidP' => $send,
                'pidG' => $get,
                'pidP' => $send
            ]
        );

        if(!empty($last)) $last = [$last[0]->message, $last[0]->created_at];
        
        return $last;
    }

    public static function getLasts($get, $send): array{
        return DB::select(
            "SELECT m.message, m.created_at, u.name, m.id
            FROM conversation c
            INNER JOIN messages m
            ON c.messages_id = m.id
            INNER JOIN user u
            ON c.post_id = u.id
            WHERE (
                (c.post_id = :sidP AND c.get_id = :gidG) OR
                (c.post_id = :gidP AND c.get_id = :sidG)
            ) AND m.status = 0 AND u.name != :name;",
            [
                'sidP' => $send,
                'gidG' => $get,
                'gidP' => $get,
                'sidG' => $send,
                'name' => session('user')['name']
            ]
        );
    }
}
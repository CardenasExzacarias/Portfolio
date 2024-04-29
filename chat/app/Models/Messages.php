<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Messages extends Model
{
    use HasFactory;

    static function send($get, $message, $send, $date): void{
        $id = Messages::insertGetId([
            'message' => $message,
            'created_at' => $date
        ]);

        Conversation::insert([
            'post_id' => $send,
            'get_id'=> $get,
            'messages_id' => $id
        ]);
    }

    static function unseen($post): array{
        return DB::select(
            "SELECT u.name, m.created_at, m.message
            FROM messages m
            INNER JOIN conversation c
            ON m.id = c.messages_id
            INNER JOIN user u
            ON u.id = c.post_id
            WHERE (c.get_id = :user AND c.post_id = :post) AND m.status = 0
            ORDER BY m.id DESC;",
            [
                'user' => session('user')['id'],
                'post' => $post
            ]
        );
    }

    static function changeStatus($post): void{
        DB::select(
            "UPDATE messages m
            INNER JOIN conversation c
            ON c.messages_id = m.id
            INNER JOIN user u
            ON c.post_id = u.id
            SET m.status = 1
            WHERE m.status = 0 AND (u.id = :post AND c.get_id = :user)",
            [
                'user' => session('user')['id'],
                'post' => $post
            ]
        );
    }
}

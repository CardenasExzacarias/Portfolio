<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notifications extends Model
{
    use HasFactory;

    public static function add($post, $get): void{
        Notifications::insert([
            'id_post' => $post,
            'id_get' => $get
        ]);
    }

    public static function get($id): array{
        $notifications = DB::select(
            "SELECT id_post
            FROM notifications
            WHERE id_get = :id",
            ['id' => $id]
        );

        return $notifications;
    }

    public static function seen($post, $get): void{
        Notifications::where('id_get', '=', $get)
        ->where('id_post', '=', $post)
        ->delete();
    }
}
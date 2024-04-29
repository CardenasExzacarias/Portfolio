<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Friends extends Model
{
    use HasFactory;

    public static function addFriend($idu, $idf): void
    {
        Friends::insert(['id_user' => $idu, 'id_friend' => $idf]);
    }

    public static function unFriend($idf, $idu): void
    {
        DB::select(
            "DELETE FROM friends 
            WHERE (id_user = :widu AND id_friend = :widf) OR
            (id_user = :oidf AND id_friend = :oidu);",
            ['widu' => $idu, 'widf' => $idf, 'oidf' => $idf, 'oidu' => $idu]
        );
    }

    public static function getedFriends($id): array{
        return DB::select(
            "SELECT DISTINCT u.name, u.id
            FROM user AS u
            INNER JOIN friends as f
            ON f.id_user = u.id
            WHERE f.id_friend = :id;",
            ['id' => $id]
        );
    }

    public static function postedFriends($id): array{
        return DB::select(
            "SELECT DISTINCT u.name, u.id
            FROM user AS u
            INNER JOIN friends as f
            ON f.id_friend = u.id
            WHERE f.id_user = :id;",
            ['id' => $id]
        );
    }

    public static function getFriends($id): array{
        $friendsP = static::postedFriends($id);
        $friendsG = static::getedFriends($id);

        return Functions::mergeArrays($friendsG, $friendsP);
    }
}

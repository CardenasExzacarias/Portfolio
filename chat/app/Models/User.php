<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function searchName($user): array
    {
        return DB::select(
            "SELECT name, id
            FROM user
            WHERE name = :user;",
            ['user' => $user]
        );
    }

    public static function searchId($user): array
    {
        return DB::select(
            "SELECT name
            FROM user
            WHERE id = :user;",
            ['user' => $user]
        );
    }

    public static function getUsers($user): array{
        $users = User::searchName($user);

        return Functions::objectToArray($users);
    }

    public static function getUser($user): array{
        $user = User::searchId($user);

        return Functions::objectToArray($user);
    }

    public static function get($name, $password): Object{
        return User::select('user.id', 'user.name')->
        where('name', '=', $name)->
        where('password', '=', $password)->
        get();
    }

    public static function register($name, $password, $email): void{
        User::insert([
            'name' => $name,
            'password'=> $password,
            'email' => $email,
        ]);
    }
}

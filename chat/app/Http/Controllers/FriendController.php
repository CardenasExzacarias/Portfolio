<?php

namespace App\Http\Controllers;

use App\Models\Friends;

class FriendController extends Controller
{
    public function set()
    {
        isset($_POST['add']) ?
        Friends::addFriend(session('user')['id'], $_POST['add']) :
        Friends::unFriend($_POST['delete'], session('user')['id']);
        
        return redirect("home");
    }
}
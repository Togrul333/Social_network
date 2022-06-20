<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function profile($name)
    {
        $user = User::where('name', $name)->first();
        if (!$user) {
            abort(404);
        }
        $statuses = $user->statuses()->notComment()->get();
        $authUserIsFriend = Auth::user()->isFriendWith($user);
        return view('user.profile', compact('user', 'statuses', 'authUserIsFriend'));
    }
}

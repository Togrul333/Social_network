<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index($name)
    {
        $user = User::where('name', $name)->first();
        if (!$user) {
            return redirect()->route('home')->with('info', 'Пользователь не найден');
        }
        if (Auth::user()->hasFriendRequestPending($user)) {
            return redirect()->route('home')->with('info', 'Пользователю же отправлен запрос');
        }
        if (Auth::user()->isFriendWith($user)) {
            return redirect()->route('profile', ['name', $user->name])->with('info', 'Пользователь уже в друзьях');
        }
        Auth::user()->addFriend($user);
        return redirect()->back()->with('info', 'Пользователью отправлен запрос!!');

    }

    public function accept($name)
    {
        $user = User::where('name', $name)->first();

        if (!$user) {
            return redirect()->route('home')->with('info', 'Пользователь не найден');
        }
        Auth::user()->acceptFriendRequest($user);
        return redirect()->back()->with('info', 'Запрос пользователя принят!!');
    }

    public function delete($name)
    {
        $user = User::where('name', $name)->first();

        if (!Auth::user()->isFriendWith($user)) {
            return redirect()->back();
        }
        if (!$user) {
            return redirect()->route('home')->with('info', 'Пользователь не найден');
        }

        Auth::user()->deleteFriend($user);

        return redirect()->back()->with('info','Удален из друзей !!');
    }
}

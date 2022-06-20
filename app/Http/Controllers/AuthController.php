<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function registerPost(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'name' => 'required|unique:users',
            'password' => 'required',
        ]);
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        Auth::login($user);
        return redirect()->route('home')->with('info', 'Вы успешно зарегистрировались');
    }

    public function loginPost(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->with('info', '  Nc !! ');
        }
        return redirect()->route('home')->with('info', 'Вы успешно вошли ');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('info', 'Bay bay !!! ');

    }

    public function users()
    {
        $users = User::get();
        return view('user.users', compact('users'));

    }
}

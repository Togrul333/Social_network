<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $usersNotContact = User::whereDoesntHave('friendofMine', function ($q) {
            $q->where('friend_id', '=', Auth::id());
        })
            ->whereDoesntHave('friendof', function ($q) {
                $q->where('user_id', '=', Auth::id());
            })
            ->where('id', "!=", Auth::id())->limit(4)->get();

//        dd($usersNotContact);
//----------------------------------------------------------------

//       $users= User::has('friendofMine')->get();
//       $users2= User::has('friendof')->get();
//       dd($users,$users2);

//        $users = User::whereHas('friendof',function (Builder $query){
//            $query->where('accepted',true);
//        })->get();
//        dd($users);


//        $users = User::whereRelation('friendof','accepted',false)->where('id' , "!=" , Auth::id())->get();
//        dd($users);


//---------------------------------------------------------------------

        return view('index', compact('usersNotContact'));
    }
}

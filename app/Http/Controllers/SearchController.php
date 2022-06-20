<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('query');

        if (!$query) {
            return redirect()->route('home');
        }

        $users = User::where(DB::raw("CONCAT (firstname,' ',lastname)"),
            'like', "%{$query}%")
            ->orWhere('name', 'like', "%{$query}%")
            ->get();

        return view('layouts.search',compact('users'));
    }
}

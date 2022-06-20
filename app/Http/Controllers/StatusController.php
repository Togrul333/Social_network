<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);
        Auth::user()->statuses()->create([
            'body' => $request->get('status')
        ]);

        return redirect()->route('home')->with('info', 'Запись добавлен !!');
    }

    public function statuses()
    {
        if (Auth::check()) {
            $statuses = Status::notComment()->where(function ($q) {
                return $q->where('user_id', Auth::id())
                    ->orWhereIn('user_id', Auth::user()->friends()->pluck('id'));
            })
                ->orderBy('created_at', 'desc')
                ->get();
//    dd($statuses);
            return view('user.stena', compact('statuses'));

        }
    }

    public function comment(Request $request, $statusId)
    {
//        $this->validate($request,[
//            'comment-{$statusId}'=>'required'
//        ]);

        $status = Status::notComment()->find($statusId);
        if (!$status) {
            redirect()->route('home');
        }
        if (!Auth::user()->isFriendWith($status->user)) {
            redirect()->route('home');
        }
        $comment = new Status();
        $comment->body = $request->get("comment-{$status->id}");

        //Если вы хотите назначить дочернюю модель новой родительской модели,  вы можете использовать этот associate метод.
        $comment->user()->associate(Auth::user());
//        $comment->user_id = Auth::id();
//         $comment->parent_id = $status->id;

        $status->comments()->save($comment);
        return redirect()->back();
    }

    public function Liked($statusId)
    {
        $status = Status::find($statusId);

        if (!$status) {
            return redirect()->back();
        }
//        if (! Auth::user()->isFriendWith($status->user)) {
//            dd($status);
//        }
        if (Auth::user()->hasLikedStatus($status)) {
            return redirect()->back();
        }
        $status->likes()->create(['user_id' => Auth::user()->id]);
        return redirect()->back();
    }
}

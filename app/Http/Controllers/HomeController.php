<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function editComment($comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        if (Gate::allows('edit-comment', $comment)) {
            return "ook!";
        } else {

            echo gettype($comment->user_id) . "<br>";
            echo gettype($comment_id) . "<br>";
            echo ($comment->user_id === $comment_id) . "<br>";
            echo $comment . "<br>";
            return "sr";
        }
    }
}

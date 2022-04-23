<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('Admin.comments.index',[
            'comments' => Comment::all()
        ]);
    }

    public function show(Comment $comment)
    {
         return view('Admin.comments.show',[
             'comment' => $comment
         ]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect(route('comment.index'));
    }
}

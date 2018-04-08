<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\User;

class CommentController extends Controller
{
    public function create(Request $request, $newsId)
    {
        $request->validate([
            'comment' => 'required|max:255',
        ]);

        Comment::create(['comment' => $request->comment, 'user_id' => Auth::id(), 'news_id' => $newsId]);
        return redirect(route('news', ['id' => $newsId]));
    }

    public function getCommentsByUser($userId)
    {
        $user = User::find($userId);
        $comments = Comment::where('user_id', $userId)->paginate(5);
        return view('comments-by-user', ['user' => $user, 'comments' => $comments]);
    }
}

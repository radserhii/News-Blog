<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

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
}

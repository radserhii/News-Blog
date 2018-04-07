<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Tag;
use App\Comment;

class ApiController extends Controller
{
    public function getCount($id)
    {
        $count = News::find($id)->count_views;
        return response()->json(['count' => $count], 200);
    }

    public function updateCount(Request $request, $id)
    {
        $news = News::findOrFail($id);
        if ($news->update($request->all())) {
            return response()->json(['message' => 'Counter updated successful'], 200);
        }
        return response()->json(['message' => 'Error updated'], 500);
    }

    public function getTags()
    {
        $tags = Tag::all();
        return response()->json(['tags' => $tags], 200);
    }

    public function getNewsComments($newsId)
    {
        $comments = Comment::with('user')
            ->where('news_id', $newsId)
            ->orderByDesc('like')
            ->get();
        return response()->json(['comments' => $comments]);
    }

    public function commentLikeCounter($commentId, $action)
    {
        $comment = Comment::find($commentId);
        switch ($action) {
            case 'like':
                $count = $comment->like++;
                $comment->update(['like' => $count]);
                break;
            case 'dislike':
                $count = $comment->dislike++;
                $comment->update(['dislike' => $count]);
                break;
        }
        return response()->json($comment, 200);
    }
}

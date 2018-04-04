<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class ApiController extends Controller
{
    public function getCount($id)
    {
        $count = News::find($id)->count_views;
        return response()->json(['count' => $count], 200);
    }

    public function updateCount(Request $request, $id)
    {

        $news = NEws::findOrFail($id);
        if($news->update($request->all())) {
            return response()->json(['message' => 'Counter updated successful'], 200);
        }
        return response()->json(['message' => 'Error updated'], 500);
    }
}
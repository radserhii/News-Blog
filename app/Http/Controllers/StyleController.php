<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Style;

class StyleController extends Controller
{
    public function index()
    {
        return view('dashboard.style');
    }

    public function store(Request $request)
    {
        $style = Style::first();
        if ($style == null) {
            $style = new Style;
            $style->create($request->all());
            return redirect()->route('dashboard.style');
        }
        $style->update($request->all());
        return redirect()->route('dashboard.style');
    }
}

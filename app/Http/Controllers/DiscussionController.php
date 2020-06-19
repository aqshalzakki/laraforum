<?php

namespace App\Http\Controllers;

use App\Models\Discussion;

class DiscussionController extends Controller
{
    public function index()
    {
        $discussions = Discussion::all();
        return view('discussions.index', compact('discussions'));
    }
}

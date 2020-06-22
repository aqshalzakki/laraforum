<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\Store;
use App\Models\Comment;
use App\Models\Discussion;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');        
    }

    public function store(Store $request, Discussion $discussion)
    {
        $commentData = array_merge($request->only('body'), [
            'user_id' => auth()->id()
        ]);

        $discussion->comments()->create($commentData);

        return back()->with('successMessage', 'Your comment has been added!');
    }
}

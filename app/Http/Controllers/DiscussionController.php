<?php

namespace App\Http\Controllers;

use App\Http\Requests\Discussions\Store;
use App\Models\Category;
use App\Models\Discussion;

class DiscussionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->except(['index', 'show']);
    }

    public function index()
    {
        $discussions = Discussion::latest()->get();
        return view('discussions.index', compact('discussions'));
    }

    public function show(Discussion $discussion, $slug)
    {
        $discussion->load([
            'user', 'comments'
        ]);
        return view('discussions.show', compact('discussion'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('discussions.create', compact('categories'));
    }

    public function store(Store $request)
    {
        $discussionData = array_merge($request->only(['title', 'body', 'category_id']), [
            'user_id' => auth()->id()
        ]);

        Discussion::create($discussionData);

        return redirect()->route('discussions.index')
            ->withMessage('Discussion created successfully!');
    }
}

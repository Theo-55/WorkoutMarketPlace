<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return Inertia::render('Feed/Index', [
            'name' => 'thatcher',
            'posts' => $posts
        ]);
    }

    public function view($id)
    {
        $userPost = Post::where('id', $id)->get();
        return Inertia::render('Feed/Posts/ViewPost', [
            'userPost' => $userPost,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use App\Http\Requests\PostRequest;

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
            'post' => $userPost,
        ]);
    }

    public function create()
    {
        return Inertia::render('Feed/Posts/Save');
    }

    public function store(PostRequest $request)
    {
        try{
            Post::create([
                'title' => $request->title,
                'description' =>$request->description,
                'body' => $request->body
            ]);
            return Inertia();
        }
        catch(\Throwable $e){

                return Inertia($e);
        }


    }
}

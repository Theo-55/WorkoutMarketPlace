<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    //
    public function index()
    {
//        $posts = Post::all();
        return Inertia::render('Feed/Index', [
            'posts' => Post::paginate('3')
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
                'user_id' => auth()->user()->id,
                'Title' => $request->Title,
                'description' =>$request->description,
                'body' => $request->body
            ]);
            return Inertia::render('Feed/Index');
        }
        catch(\Throwable $e){

                return Inertia($e);
        }


    }
}

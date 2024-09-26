<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

        return PostResource::collection($posts);
    }

    public function store(Request $request){
        $data = $request->all();

        $post = Post::create($data);

        return new PostResource($post);
    }
}

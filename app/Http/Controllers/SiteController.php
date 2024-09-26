<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Post;

class SiteController extends Controller
{
    public function index(){

        $posts = Post::paginate(10);

        return view('site/index', compact('posts'));
    }
}

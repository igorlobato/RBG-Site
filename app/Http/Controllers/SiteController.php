<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Post;

class SiteController extends Controller
{
    public function index(){

        //$posts = Post::paginate(10);

        //Fazer dessa forma reduz o número de consultas no banco de dados
        $posts = Post::with('user')->withCount('comentarios')->paginate(10);
        //withCount adiciona automáticamente uma coluna chamada comentarios_count a cada post

        return view('site/index', compact('posts'));
    }
}

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
        $posts = Post::with('user')
        ->withCount('comentarios')
        ->withCount(['curtidaspost as curtidas_count' => function ($query) {
            $query->where('descurtir', false);
        }])
        // Contar descurtidas onde descurtir é true
        ->withCount(['curtidaspost as descurtidas_count' => function ($query) {
            $query->where('descurtir', true);
        }])
        ->paginate(10);
        //withCount adiciona automáticamente uma coluna chamada comentarios_count a cada post

        return view('site/index', compact('posts'));
    }
}

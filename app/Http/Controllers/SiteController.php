<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;

class SiteController extends Controller
{
    public function index(): Response{

        return Inertia::render('RGB/Index', [
            'posts' => Post::with('user:id,name', 'topico:id,titulo')->latest()->get(),
            'auth' => ['user' => auth()->user()],
        ]);
    }

        // //$posts = Post::paginate(10);

        // //Fazer dessa forma reduz o número de consultas no banco de dados
        // $posts = Post::with('user')
        // ->withCount('comentarios')
        // ->withCount(['curtidaspost as curtidas_count' => function ($query) {
        //     $query->where('descurtir', false);
        // }])
        // // Contar descurtidas onde descurtir é true
        // ->withCount(['curtidaspost as descurtidas_count' => function ($query) {
        //     $query->where('descurtir', true);
        // }])
        // ->orderBy('created_at', 'desc')
        // ->paginate(10);
        // //withCount adiciona automáticamente uma coluna chamada comentarios_count a cada post

        // return view('site/index', compact('posts'));

    public function details($id){
        $post = Post::with(['comentarios.user', 'comentarios.curtidascomentario'])
        ->withCount('comentarios')
        ->withCount(['curtidaspost as curtidas_count' => function ($query) {
            $query->where('descurtir', false);
        }])
        // Contar descurtidas onde descurtir é true
        ->withCount(['curtidaspost as descurtidas_count' => function ($query) {
            $query->where('descurtir', true);
        }])
        ->where('id', $id)->first();

        return view('site/details', compact('post'));
    }

    public function create()
    {
        //
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        //
    }
}

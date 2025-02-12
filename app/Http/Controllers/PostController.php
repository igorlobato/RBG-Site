<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('site.novopost');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topicos = Topicos::all();
        dd($topicos); // Verifique os dados que estão sendo passados para o Vue
        return Inertia::render('NovoPost', [
            'topicos' => Topicos::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'id_topico' => 'required|exists:topicos, id',
            'titulo' => 'required|string|max:100',
            'descricao' => 'required|string',
            'imagem' => 'nullable|image|max:2048', // Valida se a imagem é válida
        ], [
            'topico.required' => 'O campo topico é obrigatório.',
            'titulo.required' => 'O campo titulo é obrigatório.',
            'descricao.min' => 'O campo descrição não pode ter menos que 4 caracteres.'
        ]);

        $imagemPath = null;

        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('posts', 'public'); // Salva na pasta storage/app/public/posts
        }


        Post::create([
            'titulo' => $request->title,
            'id_topico' => $request->id_topico,
            'descricao' => $request->content,
            'imagem' => $imagemPath,
            'user_id' => auth()->id(),
        ]);

        // Após tudo dar certo envia uma mensagem chamada sucesso com o texto, que deve ser tratada na página redirecionada
        return redirect()->route('home')->with('sucess', 'Post cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}

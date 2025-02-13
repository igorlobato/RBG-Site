<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;

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
        return Inertia::render('RGB/NovoPost', [
            'topicos' => $topicos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'topico_id' => 'required|exists:topicos,id',
            'title' => 'required|string|max:100',
            'content' => 'required|string',
            'imagem' => 'nullable|image|max:2048', // Valida se a imagem é válida
        ], [
            'topico_id.required' => 'O campo topico é obrigatório.',
            'title.required' => 'O campo titulo é obrigatório.',
            'content.min' => 'O campo descrição não pode ter menos que 4 caracteres.'
        ]);

        $imagemPath = null;

        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('posts', 'public'); // Salva na pasta storage/app/public/posts
        }


        Post::create([
            'titulo' => $request->title,
            'id_topico' => $request->topico_id,
            'descricao' => $request->content,
            'imagem' => $imagemPath,
            'id_user' => auth()->id(),
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
        Gate::authorize('update', $post);

        $validated = $request->validate([
            'descricao' => 'required|string|max:255',
        ]);

        $post->update($validated);

        return redirect(route('rgb.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}

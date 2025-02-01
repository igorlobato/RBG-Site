<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
    public function create(Request $request)
    {
        $request->validate([
            'topico' => 'required|string|max:10',
            'titulo' => 'required|string|max:300',
            'descricao' => 'required|string|min:4',
        ], [
            'topico.required' => 'O campo topico é obrigatório.',
            'titulo.required' => 'O campo titulo é obrigatório.',
            'descricao.min' => 'O campo descrição não pode ter menos que 4 caracteres.'
        ]);

        $post = $request->all();
        $post['id_user'] = auth()->id();
        $post = Post::create($post);

        // Após tudo dar certo envia uma mensagem chamada sucesso com o texto, que deve ser tratada na página redirecionada
        return redirect()->route('site.index')->with('sucesso', 'Post cadastrado com sucesso!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

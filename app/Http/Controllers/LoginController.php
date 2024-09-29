<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('login.cadastro');
    }

    public function entrar()
    {
        return view('login.login');
    }

    public function logar(Request $request){
        // Valida os campos de email e senha
        $request->validate([
            'email' => ['required', 'email'],
            'senha' => ['required'],
        ], [
            'email.required' => 'O campo E-mail é obrigatório!',
            'email.email' => 'O email não é válido!',
            'senha.required' => 'O campo senha é obrigatório!',
        ]);

        // Cria um array de credenciais, renomeando 'senha' para 'password'
        $credenciais = [
            'email' => $request->email,
            'password' => $request->senha,
        ];

        if (Auth::attempt($credenciais, $request->remember)) {
            $request->session()->regenerate();
            // redirect()->intended() É usado para rediricionar para o lugar que o usuário queria mas foi redirecionado para a página de login
            return redirect()->route('site.index');
        } else {
            return redirect()->back()->with('erro', 'Email ou senha invalida.');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('site.index'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

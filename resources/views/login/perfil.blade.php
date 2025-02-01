@extends('site.layout')
@section('title', 'RGB')
@section('conteudo')

<hr>
<span>Dados do Usuário</span>
<hr>
<span>Foto de Perfil</span>
<div class="fotodeperfil">
    @if(auth()->user()->fotodeperfil==null)
        <span class="material-symbols-outlined" style="font-size: 400px; color:white;">
            person
        </span>
    @else
        <img src="{{auth()->user()->fotodeperfil}}" alt="mdo" width="32" height="32" class="rounded-circle">
    @endif

</div>
    <span>E-mail:</span>
    <br>
    <span>Nome de Usuário:</span>
    <br>
    <span>Senha:</span>
    <br>
    @if(auth()->user()->adm==1)
        <span style="color:green">ADM</span>
        <br>
    @endif
    <hr>

<div>
    <span class="branco">Editar Dados</span>
</div>

@endsection

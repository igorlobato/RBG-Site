@extends('site.layout')
@section('title', 'Postagem')
@section('conteudo')

<div class="card bg-dark text-white">
    <div class="card-body">
    <h5 class="card-title topico">{{$post->topico}}</h5>
    <h5 class="card-title titulo">{{$post->titulo}}</h5>
    <img src="{{$post->imagem}}" class="card-img-top" style="width: 550px; margin:auto; display:block; border-radius: 15px;" alt="">
    <br>
    <p class="card-text">{{$post->descricao}}</p>
</div>
<div class="card-body align-center">
    <a href="#" class="card-link text-primary align-center"><span class="material-icons iconspace">
        thumb_up
    </span>  {{$post->curtidas_count}}</a>
    <a href="#" class="card-link text-primary align-center"><span class="material-icons">
        thumb_down
    </span>{{$post->descurtidas_count}}</a>
</div>
<ul class="list-group list-group-flush">
    <li class="list-group-item bg-dark text-white">{{$post->user->nome}}</li>
    <li class="list-group-item bg-dark text-white align-center"><span class="material-symbols-outlined">
    comment
</span>{{$post->comentarios_count}}</li>
</ul>
</div>

{{-- Amanhã ajeitar os bugs e listar comentários. --}}

@endsection

@extends('site.layout')
@section('title', 'RGB')
@section('conteudo')

<div class="branco">
Ordenar
</div>
@foreach($posts as $post)
<div class="card bg-dark text-white">
    <div class="card-body">
        <h5 class="card-title">{{$post->topico}}</h5>
        <h5 class="card-title">{{$post->titulo}}</h5>
        <img src="{{$post->imagem}}" class="card-img-top" style="width: 550px; margin:auto; display:block; border-radius: 15px;" alt="">
        <br>
      <p class="card-text">{{$post->descricao}}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item bg-dark text-white">Postador: {{$post->user->nome}}</li>
      <li class="list-group-item bg-dark text-white">Comentários: {{$post->comentarios_count}}</li>
    </ul>
    <div class="card-body">
      <a href="#" class="card-link text-primary">Gostei</a>
      <a href="#" class="card-link text-primary">Não Gostei</a>
    </div>
</div>

<hr>
@endforeach

<div class="row center">
    {{ $posts->links('custom.pagination') }}
</div>

@endsection

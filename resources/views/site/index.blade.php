@extends('site.layout')
@section('title', 'RGB')
@section('conteudo')


<div class="branco">
    @if ($mensagem = Session::get('sucesso'))
    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Parabéns</div>
        <div class="card-body">
          {{-- <h5 class="card-title">Success card title</h5> --}}
          <p class="card-text">{{$mensagem}}</p>
        </div>
    </div>
    @endif
    <div class="dropdown" style="margin: 10px 0px;">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
          Organizar
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Mais recentes</a></li>
          <li><a class="dropdown-item" href="#">Mais antigos</a></li>
          <li><a class="dropdown-item" href="#">Mais curtidos</a></li>
          <li><a class="dropdown-item" href="#">Mais comentados</a></li>
        </ul>
      </div>
</div>
@foreach($posts as $post)

<a href="{{ route('site.details', $post->id)}}" style="text-decoration:none; color:inherit;">
    <div class="card bg-dark text-white">
        <div class="card-body">
        <h5 class="card-title topico">{{$post->topico}}</h5>
        <h5 class="card-title titulo">{{$post->titulo}}</h5>
        <img src="{{$post->imagem}}" class="card-img-top" style="width: 550px; margin:auto; display:block; border-radius: 15px;" alt="">
        <br>
        <p class="card-text">{{$post->descricao}}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item bg-dark text-white">{{$post->user->nome}}</li>
        <li class="list-group-item bg-dark text-white align-center"><span class="material-symbols-outlined">
        comment
    </span>{{$post->comentarios_count}}</li>
</ul>
<div class="card-body align-center">
    <a href="#" class="card-link text-primary align-center"><span class="material-icons iconspace">
        thumb_up
    </span>  {{$post->curtidas_count}}</a>
    <a href="#" class="card-link text-primary align-center"><span class="material-icons">
        thumb_down
    </span>{{$post->descurtidas_count}}</a>
</div>
</div>
</a>

<hr>
@endforeach

<div class="row" style="margin-bottom: 100px; justify-content: center;">
    {{ $posts->links('custom.pagination') }}
</div>

@endsection

@extends('site.layout')
@section('title', 'Novo Post')
@section('conteudo')

<div>
    <form action="{{route('posts.novopost')}}" method="POST">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4" class="branco">Novo Post</label>
            <input type="text" class="form-control" id="Topico" placeholder="Topico" name="topico">
          </div>
          <div class="form-group col-md-6" style="margin-top: 32px">
            <input type="text" class="form-control" id="titulo" placeholder="Titulo" name="titulo">
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="descricao" placeholder="Descrição..." name="descricao">
        </div>
        <button type="submit" class="btn btn-primary center">Postar</button>
    </form>
</div>
<br>
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header">Erro</div>
            <div class="card-body">
            {{-- <h5 class="card-title">Success card title</h5> --}}
            <p class="card-text">{{$error}}</p>
            </div>
        </div>
        <br>
    @endforeach
@endif
</div>

@endsection

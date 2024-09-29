@extends('site.layout')
@section('title', 'RGB')
@section('conteudo')

<div>
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4" class="branco">Cadastre-se</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
          </div>
          <div class="form-group col-md-6" style="margin-top: 32px">
            <input type="text" class="form-control" id="inputPassword4" placeholder="Nome de Usuário" name="nome">
          </div>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="inputAddress" placeholder="Senha" name="senha">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar-se</button>
    </form>
</div>

@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}} <br>
    @endforeach
@endif

@endsection

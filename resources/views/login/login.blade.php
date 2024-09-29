@extends('site.layout')
@section('title', 'RGB')
@section('conteudo')


<br>
<div>
    <form action="{{route('login.logar')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="inputEmail4" class="branco">E-mail</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="E-mail" name="email">
        </div>
        <div class="form-group">
            <label for="inputPassword4" class="branco">Senha</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Senha" name="senha">
        </div>
        <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck" name="remember">
              <label class="form-check-label branco" for="gridCheck">
                  Lembrar-me
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>

@if($mensagem = Session::get('erro'))
    <br>
    <p class="branco">{{$mensagem}}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $erro)
        <br>
        <p class="branco">{{$erro}}</p>
    @endforeach
@endif
@endsection

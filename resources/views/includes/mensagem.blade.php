@if($mensagem = Session::get('sucesso'))
<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
    <div class="card-header">Parabéns</div>
    <div class="card-body">
      {{-- <h5 class="card-title">Success card title</h5> --}}
      <p class="card-text">{{$mensagem}}</p>
    </div>
</div>
@endif

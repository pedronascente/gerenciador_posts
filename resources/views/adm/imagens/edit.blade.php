@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Editar Sessão') }}</div>
                <div class="card-body">
                    <form action="{{route('sessao.update',4)}}"  method="POST">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <label for="InputNome" class="form-label">Nome:</label>
                        <input type="text" name="nome" class="form-control" >
                        <div id="nomelHelp" class="form-text">este campo é obrigatório.</div>
                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
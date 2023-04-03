@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Editar Sessão') }}</div>
                <div class="card-body">
                    <form action="{{route('sessao.update',$sessao->id)}}"  method="POST">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <label for="InputNome" class="form-label">Nome:</label>
                        <input type="text" name="nome"  value="{{$sessao->nome}}" class="form-control" >
                        <!--FORM VALIDATE-->
                        @if ($errors->any())
                            <div class="alert alert-danger mt-2">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
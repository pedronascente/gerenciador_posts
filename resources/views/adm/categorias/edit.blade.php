@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Editar categoria') }}</div>
                <div class="card-body">
                    <form action="{{route('categoria.update',$categoria->id)}}"  method="POST">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <label  class="form-label">Nome:</label>
                        <input type="text" name="nome"  value="{{$categoria->nome}}" class="form-control" >
                            <div class="max-width mt-2">
                                <!--FORM VALIDATE-->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
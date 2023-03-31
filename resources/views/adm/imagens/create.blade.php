@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Nova Imagem') }}</div>
                <div class="card-body">
                    <form action="{{route('imagem.store')}}"  method="POST">
                      @csrf
                      <div class="mb-3">
                            <label for="formFile" class="form-label">Upload de Imagem:</label>
                            <input class="form-control" type="file" id="formFile">
                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
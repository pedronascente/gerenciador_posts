@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Nova Imagem') }}</div>
                <div class="card-body">
                    <form action="{{route('imagem.store')}}" enctype="multipart/form-data" method="POST">
                      @csrf
                      <div class="mb-3">
                            <label for="formFile" class="form-label">Upload de Imagem:</label>
                            <input type="file"  name="arquivo" class="form-control" id="arquivo">
                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
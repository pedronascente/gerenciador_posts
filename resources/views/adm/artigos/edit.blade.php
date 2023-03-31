@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Editar Post') }}</div>
                <div class="card-body">
                <form action="{{route('post.update',$artigo[0]->id)}}"  method="POST">
                       @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <label class="form-label">Titulo:</label>
                        <input type="text" name="titulo" class="form-control"  value="{{$artigo[0]->titulo}}" >
                        @error('titulo')
                          <div class="alert alert-danger mt-2 mb-1">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Descrição:</label>
                        <input type="text" name="descricao" class="form-control"  value="{{$artigo[0]->descricao}}" >
                        <!--FORM VALIDATE-->
                        @error('descricao')
                          <div class="alert alert-danger mt-2 mb-1">{{ $message }}</div>
                        @enderror 
                      </div>
                       <div class="mb-3">
                          <label class="form-label">Categoria:</label>
                          <select class="form-select" name="categoria_id"  aria-label="Selecione uma categoria">
                          <option value="">Selecione...</option>
                            @foreach ($categorias as $item)
                                <option value="{{$item->id}}" @if ($artigo[0]->categoria_id==$item->id) selected  @endif >{{$item->nome}}</option>
                            @endforeach
                          </select>
                          <!--FORM VALIDATE-->
                          @error('categoria_id')
                            <div class="alert alert-danger mt-2 mb-1">{{ $message }}</div>
                          @enderror 
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Texto: </label>
                          <textarea class="form-control"  name="texto" rows="10">{{$artigo[0]->texto}}</textarea>
                          <!--FORM VALIDATE-->
                          @error('texto')
                            <div class="alert alert-danger mt-2 mb-1">{{ $message }}</div>
                          @enderror 
                      </div>
                      <div class="mb-3">
                          <label> Publicar em :</label><br>
                          <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                              @for ($i = 0; $i < count($sessoes); $i++)
                                  <input type="checkbox" class="btn-check"  
                                      @foreach ($artigo[0]->sessoes as $item)
                                        @if ($item->id == $sessoes[$i]->id)
                                           checked="true"
                                        @endif   
                                      @endforeach  
                                  name="publicar[{{$sessoes[$i]->id}}]" id="btncheck{{$i}}" autocomplete="off">
                                  <label class="btn btn-outline-primary" for="btncheck{{$i}}">{{$sessoes[$i]->nome}}</label>
                              @endfor    
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Editar</button>
                    </form>         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
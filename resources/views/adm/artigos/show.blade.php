@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">{{ __($artigo[0]->categoria->nome) }}</div>
                <div class="card-body p-5">
                    <h1>{{$artigo[0]->titulo}}</h1>
                    
                    {!!$artigo[0]->texto !!}
                    
                    <hr>

                    <b>Categoria :</b> {{$artigo[0]->categoria->nome}} <br>
                    <b>Sessão (ões) :</b>

                    @if (isset($artigo[0]->sessoes[0]))                      
                        @foreach ($artigo[0]->sessoes as $item)
                            {{$item->nome}} - 
                        @endforeach
                    @else
                       - Este arquivo não está sendo publicado!
                    @endif
                    
                </div>
                <div class="card-footer ">
                    <a href="{{route('post.edit',$artigo[0]->id)}}" class="btn btn-primary">Editar</a>
                    <a href="{{route('post.index')}}" class="btn btn-danger">Sair</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
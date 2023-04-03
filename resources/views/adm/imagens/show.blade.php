@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">{{ __('Detalhes da Imagem') }}</div>
                <div class="card-body ">
                 <p> <img src="/storage/{{$imagem->nome}}" class="img-fluid" alt="{{$imagem->nome}}"></p>
                  <ul>
                    <li><b>Id : </b>{{$imagem->id}}</li>
                    <li><b>Nome : </b>{{$imagem->nome}}</li>
                    <li><b>Copie : </b>{{$imagem->src}}</li>
                  </ul>
                </div>
                <div class="card-footer text-center">
                  <table>
                    <tr>
                      <td>
                        <a href="{{route('imagem.index')}}" class="btn btn-warning">Voltar</a>
                      </td>
                      <td> 
                        <form action="{{route('imagem.destroy',$imagem->id)}}" method="POST">
                           @csrf
                           @method('DELETE')
                           <input type="submit" value="Excluir" class="btn btn-danger">
                        </form>
                      </td>
                    </tr>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Imagens') }}</div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col"><a href="{{route('imagem.create')}}" class="btn btn-success">Novo</a></th>
                        </tr>
                      </thead>
                    </table>
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">imagem</th>
                          <th scope="col">Nome</th>
                           <th scope="col">Src</th>
                           
                          <th scope="col " colspan="2"  class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>[ X ]</td>
                        <td> imgxpto.jpg</td>
                        <td> https://seusite.com/public/imgxpto.jpg</td>
                        <td  class="text-center" >
                           <a href="{{route('imagem.show',3)}}" class="btn btn-primary">Visualizar</a>
                        </td>
                        <td  class="text-center" >
                           <a href="{{route('imagem.destroy',3)}}" onclick="javascript:confirm('text')" class="btn btn-danger">Excluir</a>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
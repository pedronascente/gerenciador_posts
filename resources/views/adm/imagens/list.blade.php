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
                          <th scope="col">copie</th>
                          <th scope="col " colspan="2"  class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                            @foreach ($imagens as $item)
                                <tr>
                                  <th scope="row">{{$item->id}}</th>
                                  <td><img src="storage/{{$item->nome}}" alt="" width="70"></td>
                                  <td>{{$item->src}}</td>
                                  <td class="text-center" width="20px">
                                      <table>
                                        <tr>
                                          <td>
                                            <a href="{{route('imagem.show',$item->id)}}" class="btn btn-primary">Visualizar</a>
                                          </td>
                                          <td>
                                              <form action="{{route('imagem.destroy',$item->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Excluir" class="btn btn-danger">
                                              </form>
                                          </td>  
                                        </tr>  
                                      </table>  
                                    </td> 
                                </tr>
                            @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
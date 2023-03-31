@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Posts') }}</div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col"><a href="{{route('post.create')}}" class="btn btn-success">Novo</a></th>
                        </tr>
                      </thead>
                    </table>
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Titulo</th>
                          <th scope="col">Categoria</th>
                          <th scope="col "  colspan="2" class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($artigos as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{$item->titulo}}</td>
                                <td>{{$item->categoria->nome}}</td>
                                <td class="text-center" width="20px">
                                    <table>
                                      <tr>
                                       <td>
                                          <a href="{{route('post.edit',$item->id)}}" class="btn btn-primary">Editar</a>
                                       </td>
                                        <td>
                                            <a href="{{route('post.show',$item->id)}}" class="btn btn-danger">Visualizar</a>
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
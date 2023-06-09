@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Sessão') }}</div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                            <th scope="col"><a href="{{route('sessao.create')}}" class="btn btn-success">Novo</a></th>
                        </tr>
                      </thead>
                    </table>
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nome</th>
                          <th scope="col" class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($sessoes as $item)
                              <tr>
                                <th scope="row">{{$item->id}}</th>
                                <th>{{$item->nome}}</th>
                                <th class="text-center" width="20px">
                                    <table>
                                      <tr>
                                       <td>
                                          <a href="{{route('sessao.edit',$item->id)}}" class="btn btn-primary">Editar</a>
                                       </td>
                                        <td>
                                            <form action="{{route('sessao.destroy',$item->id)}}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <input type="submit" value="Excluir" class="btn btn-danger">
                                            </form>
                                        </td>  
                                      </tr>  
                                    </table>  
                                  </th> 
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
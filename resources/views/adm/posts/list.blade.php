@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Posts') }}</div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col"><a href="" class="btn btn-success">Novo</a></th>
                        </tr>
                      </thead>
                    </table>
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Titulo</th>
                          <th scope="col">Descrição</th>
                          <th scope="col">Categoria</th>
                          <th scope="col">Ativo</th>
                          <th scope="col "  colspan="2" class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <th scope="row">1</th>
                          <td>5 dicas para você viajar nesse final de ano!</td>
                          <td>Final de ano chegando e com ele as esperadas férias de verão, pois é quando podemos viajar e desfrutar as …</td>
                          <td>Rastreamento veicular</td>
                          <td>Sim</td>
                          <td  class="text-center" >
                             <a href="" class="btn btn-primary">Editar</a>
                          </td>
                          <td  class="text-center" >
                            <a href="" class="btn btn-danger">Visualizar</a>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">1</th>
                          <td>5 dicas para você viajar nesse final de ano!</td>
                          <td>Final de ano chegando e com ele as esperadas férias de verão, pois é quando podemos viajar e desfrutar as …</td>
                          <td>Rastreamento veicular</td>
                          <td>Sim</td>
                          <td  class="text-center" >
                             <a href="" class="btn btn-primary">Editar</a>
                          </td>
                          <td  class="text-center" >
                            <a href="" class="btn btn-danger">Visualizar</a>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">1</th>
                          <td>5 dicas para você viajar nesse final de ano!</td>
                          <td>Final de ano chegando e com ele as esperadas férias de verão, pois é quando podemos viajar e desfrutar as …</td>
                          <td>Rastreamento veicular</td>
                          <td>Sim</td>
                          <td  class="text-center" >
                             <a href="" class="btn btn-primary">Editar</a>
                          </td>
                          <td  class="text-center" >
                            <a href="" class="btn btn-danger">Visualizar</a>
                          </td>
                        </tr>
                         <tr>
                          <th scope="row">1</th>
                          <td>5 dicas para você viajar nesse final de ano!</td>
                          <td>Final de ano chegando e com ele as esperadas férias de verão, pois é quando podemos viajar e desfrutar as …</td>
                          <td>Rastreamento veicular</td>
                          <td>Sim</td>
                          <td  class="text-center" >
                             <a href="" class="btn btn-primary">Editar</a>
                          </td>
                          <td  class="text-center" >
                            <a href="" class="btn btn-danger">Visualizar</a>
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
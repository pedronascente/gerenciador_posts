@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Sessão') }}</div>
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
                          <th scope="col">Nome</th>
                          <th scope="col "  class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <th scope="row">1</th>
                          <td>Posts Rescentes</td>
                          <td  class="text-center" >
                             <a href="" class="btn btn-primary">Editar</a>
                          </td>
                        </tr>
                      <tr>
                          <th scope="row">1</th>
                          <td>Destaques</td>
                          <td  class="text-center" >
                             <a href="" class="btn btn-primary">Editar</a>
                          </td>
                        </tr>
                      <tr>
                          <th scope="row">1</th>
                          <td>Posts Relacionados</td> 
                          <td  class="text-center">
                             <a href="" class="btn btn-primary">Editar</a>
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
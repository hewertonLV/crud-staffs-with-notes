@extends('layout.app')

@section('tittle','Unidades')
@section('page-actions')
    <div class="row justify-content-end">
        <div class="dropdown col-auto">
            <a class="btn btn-success" id="addcol" type="button" data-bs-toggle="modal"
               data-bs-target="#addUnidade" >
                <i class="uil-plus p-1"></i>
                Adicionar
            </a>
        </div>
    </div>
    @include('unidade.partials.add')
@endsection
@section('content')
    <div class="card">
        <div class="card-body"><h5 class="card-title "> Listagem de unidades</h5>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome fantasia</th>
                    <th>Razão Social</th>
                    <th>CNPJ</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($unidades as $unidade)
                    <tr>
                        <td>{{$unidade->id}}</td>
                        <td>{{$unidade->nome_fantasia}}</td>
                        <td>{{$unidade->razao_social}}</td>
                        <td>{{$unidade->cnpj}}</td>
                        <td>
                            <button id="unidadeEdit{{$unidade->id}}" type="button" class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-id="{{$unidade->id}}"
                                    data-nome_fantasia="{{$unidade->nome_fantasia}}"
                                    data-razao_social="{{$unidade->razao_social}}"
                                    data-cnpj="{{$unidade->cnpj}}"
                                    data-bs-target="#editUnidade">
                                Editar
                            </button>
                            <button id="delete{{$unidade->id}}" type="button" class="btn btn-danger"
                                    data-bs-toggle="modal" data-bs-target="#excluirModal" data-nome="{{$unidade->nome}}"
                                    data-id="{{ $unidade->id }}">
                                Excluir
                            </button>
                        </td>
                    </tr>
                @endforeach
                @include('unidade.partials.edit')
                @include('unidade.partials.delete')
                </tbody>
            </table>
        </div>
    </div>

@endsection

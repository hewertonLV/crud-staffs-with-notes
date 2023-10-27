@extends('layout.app')

@section('tittle','Colaboradores')
@section('page-actions')
    <div class="row justify-content-end">
        <div class="dropdown col-auto">
            <a class="btn btn-success" id="addcol" type="button" data-bs-toggle="modal"
               data-bs-target="#addColaborador">
                <i class="uil-plus p-1"></i>
                Adicionar
            </a>
        </div>
    </div>
    @include('colaborador.partials.add')
@endsection
@section('content')
    <div class="card">
        <div class="card-body"><h5 class="card-title "> Listagem de colaboradores</h5>
            <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Unidade</th>
                    <th scope="col">Açoes</th>
                </tr>
                </thead>
                <tbody>
                @foreach($colaboradores as $colaborador)
                    <tr>
                        <td>{{$colaborador->id}}</td>
                        <td>{{$colaborador->nome}}</td>
                        <td>{{$colaborador->cpf}}</td>
                        <td>{{$colaborador->email}}</td>
                        <td>{{$colaborador->unidade->nome_fantasia ?? '---'}}</td>
                        <td>
                            <button id="colaboratorEdit{{$colaborador->id}}" type="button" class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-id="{{$colaborador->id}}"
                                    data-nome="{{$colaborador->nome}}"
                                    data-cpf="{{$colaborador->cpf}}"
                                    data-email="{{$colaborador->email}}"
                                    data-unidade_id="{{$colaborador->unidade_id}}"
                                    data-bs-target="#editColaborador">
                                Editar
                            </button>
                            <button id="delete{{$colaborador->id}}" type="button" class="btn btn-danger"
                                    data-bs-toggle="modal" data-bs-target="#excluirModal"
                                    data-nome="{{$colaborador->nome}}"
                                    data-id="{{ $colaborador->id }}">
                                Excluir
                            </button>
                        </td>
                    </tr>
                @endforeach
                @include('colaborador.partials.edit')
                @include('colaborador.partials.delete')
                </tbody>
            </table>
        </div>
    </div>

@endsection

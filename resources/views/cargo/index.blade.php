@extends('layout.app')

@section('tittle','Cargos')
@section('page-actions')
    <div class="row justify-content-end">
        <div class="dropdown col-auto">
            <a class="btn btn-success" id="addcol" type="button" data-bs-toggle="modal"
               data-bs-target="#addCargo" >
                <i class="uil-plus p-1"></i>
                Adicionar
            </a>
        </div>
    </div>
    @include('cargo.partials.add')
@endsection
@section('content')
    <div class="card">
        <div class="card-body"><h5 class="card-title "> Listagem de Cargos</h5>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cargos as $cargo)
                    <tr>
                        <td>{{$cargo->id}}</td>
                        <td>{{$cargo->cargo}}</td>
                        <td>
                            <button id="cargoEdit{{$cargo->id}}" type="button" class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-id="{{$cargo->id}}"
                                    data-cargo="{{$cargo->cargo}}"
                                    data-bs-target="#editCargo">
                                Editar
                            </button>
                            <button id="delete{{$cargo->id}}" type="button" class="btn btn-danger"
                                    data-bs-toggle="modal" data-bs-target="#excluirModal" data-cargo="{{$cargo->cargo}}"
                                    data-id="{{ $cargo->id }}">
                                Excluir
                            </button>
                        </td>
                    </tr>
                @endforeach
                @include('cargo.partials.edit')
                @include('cargo.partials.delete')
                </tbody>
            </table>
        </div>
    </div>

@endsection

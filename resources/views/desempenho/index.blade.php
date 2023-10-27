@extends('layout.app')

@section('tittle','Desempenho')
@section('page-actions')
    <div class="row justify-content-end">
        <div class="dropdown col-auto">
            <form id="addNota" method="GET" action="{{route('UnidadeCreate')}}"></form>
            <button type="submit" form="addNota" class="btn btn-success">Adicionar</button>
        </div>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body"><h5 class="card-title "> Detalhamento de desempenho</h5>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Colaborador</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($desempenhoColaboratores as $desempenhoColaborator)
                    <tr>
                        <td>{{$desempenhoColaborator->id}}</td>
                        <td>{{$desempenhoColaborator->colaborador->nome ?? '---'}}</td>
                        <td>{{$desempenhoColaborator->cargo->cargo ?? '---'}}</td>
                        <td>{{$desempenhoColaborator->nota_desempenho}}</td>
                        <td>
                            <form id="editDetails{{$desempenhoColaborator->id}}" method="GET" action="{{route('CargoColaboradorEdit',['id'=>$desempenhoColaborator->id])}}"></form>
                            <button id='edit{{$desempenhoColaborator->id}}' type="submit" form="editDetails{{$desempenhoColaborator->id}}" class="btn btn-primary">Editar</button>
                            <button id="delete{{$desempenhoColaborator->id}}" type="button" class="btn btn-danger"
                                    data-bs-toggle="modal" data-bs-target="#excluirModal"
                                    data-id="{{ $desempenhoColaborator->id }}">
                                Excluir
                            </button>
                        </td>
                    </tr>
                @endforeach
                {{--                @include('unidade.partials.edit')--}}
                                @include('desempenho.partial.delete')
                </tbody>
            </table>
        </div>
    </div>

@endsection

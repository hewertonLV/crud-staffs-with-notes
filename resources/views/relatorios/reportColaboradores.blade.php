@extends('layout.app')

@section('tittle','Relatorio de Colaboradores')

@section('content')
    <div class="card">
        <div class="card-body"><h5 class="card-title "> Listagem de colaboradores</h5>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Unidade</th>
                    <th scope="col">Cargo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($colaboradores as $colaborador)
                    <tr>
                        <td>{{$colaborador->nome}}</td>
                        <td>{{$colaborador->cpf}}</td>
                        <td>{{$colaborador->email}}</td>
                        <td>{{$colaborador->unidade->nome_fantasia ?? '---'}}</td>
                        <td>{{$colaborador->cargo ?? '---'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

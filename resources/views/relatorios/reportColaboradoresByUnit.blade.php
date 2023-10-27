@extends('layout.app')

@section('tittle','Relatorio de Colaboradores por Unidade')

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">Nome Fantasia</th>
                    <th scope="col">Razão Social</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Quantidade de Colaborador</th>
                </tr>
                </thead>
                <tbody>
                @foreach($units as $unit)
                    <tr>
                        <td>{{$unit->nome_fantasia}}</td>
                        <td>{{$unit->razao_social}}</td>
                        <td>{{$unit->cnpj}}</td>
                        <td>{{$unit->amountColaboradores ?? '---'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

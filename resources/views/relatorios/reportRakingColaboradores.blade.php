@extends('layout.app')

@section('tittle','Raking por Nota')

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="tabela-dados" class="table order-column table-striped" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">Nota de Desempenho</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Unidade</th>
                    <th scope="col">Cargo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ordenadoDescendente as $colaborador)
                    <tr>
                        <td>{{$colaborador->note ?? '---'}}</td>
                        <td>{{$colaborador->nome ?? '---'}}</td>
                        <td>{{$colaborador->cpf ?? '---'}}</td>
                        <td>{{$colaborador->email ?? '---'}}</td>
                        <td>{{$colaborador->unidade->nome_fantasia ?? '---'}}</td>
                        <td>{{$colaborador->cargo ?? '---'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('.order-column').DataTable({
                "order": [[0, 'desc']]
            });
        });

    </script>
@endsection

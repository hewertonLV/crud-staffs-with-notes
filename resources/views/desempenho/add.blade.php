@extends('layout.app')

@section('tittle','Desempenho')

@section('content')
    <div class="card">
        <div class="card-body"><h5 class="card-title "> Detalhamento de desempenho</h5>
            <form id="addDesempenho" method="POST" action="{{route('CargoColaboradorStore')}}">
                <div class="row">
                    <input type="hidden" name="id" id="id_pro" value="">
                    <div class="col-4">
                        <x-select id="vincColaborador" name="colaborador_id" label="Colaborador"
                                  :dataset="$colaboradores"
                                  required="true"/>
                    </div>
                    <div class="col-4">
                        <x-select id="vincCargo" name="cargo_id" label="Cargo" :dataset="$cargos"
                                  required="true"/>
                    </div>
                    <div class="col-4">
                        <x-input name="nota_desempenho" id="addNota" label="Nota" required="true"
                                 type="float" value=""/>
                    </div>
                    <div class="col-1" style="margin-top: 20px">
                    <button type="submit" form="addDesempenho" class="btn btn-success">Adicionar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


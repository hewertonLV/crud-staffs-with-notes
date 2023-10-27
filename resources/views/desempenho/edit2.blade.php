@extends('layout.app')

@section('tittle','Desempenho')

@section('content')
    <div class="card">
        <div class="card-body"><h5 class="card-title "> Detalhamento de desempenho</h5>
            <form id="editDesempenho" method="POST" action="{{route('CargoColaboradorStore')}}">
                <div class="row">
                    <input type="hidden" name="id" id="id_pro" value="">
                    <div class="col-4">
                        <x-select id="editColaborador" disabled="true" name="colaborador_id" label="Colaborador"
                                  :dataset="$colaboradores" selected="{{$colaborador}}"
                                  required="true"/>
                    </div>
                    <div class="col-4">
                        <x-select id="editCargo" name="cargo_id" label="Cargo" :dataset="$cargos"
                                  selected='{{$cargo}}' required="true"/>
                    </div>
                    <div class="col-4">
                        <x-input name="nota_desempenho" id="editNota" label="Nota" required="true"
                                 type="float" value="{{$nota}}"/>
                    </div>
                    <div class="col-1" style="margin-top: 20px">
                        <button type="submit" form="editDesempenho" class="btn btn-success">Atualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


<?php

namespace App\Http\Controllers;


use App\Cargo;
use App\CargoColaborador;
use App\Colaborador;
use App\Unidade;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{


    private $colaborador;

    public function __construct()
    {
        $this->colaborador = new Colaborador();
    }

    public function index()
    {
        $colaboradores = Colaborador::all() ?? [];
        $unidadesSelect = Unidade::all();
        return view('colaborador.index', compact('colaboradores', 'unidadesSelect' ?? []));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Colaborador::validarDados($data);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $request['cpf'] = str_replace(array('.', '-', '/'), "", $request->cpf);
        $this->colaborador->fill($request->input());
        $this->colaborador->push();
        toastr()->success( 'Colaborador criado com sucesso','Operação Realizada');
        return redirect()->route('ColaboradorShow');
    }

    public function update(Request $request)
    {

        $colaborador = Colaborador::findOrFail($request->id);
        $request['cpf'] = str_replace(array('.', '-', '/'), "", $request->cpf);
        $colaborador->fill($request->input());
        $colaborador->update();
        toastr()->success( 'Colaborador atualizado com sucesso','Operação Realizada');
        return redirect()->route('ColaboradorShow');
    }

    public static function destroy(Request $request)
    {
        $colaborador = Colaborador::find($request->id);
        if (CargoColaborador::checkBondWithStaff($request->id)) {
            if ($colaborador) {
                $colaborador->delete();
                toastr()->success( 'Registro excluído com sucesso','Operação Realizada');
                return redirect()->route('ColaboradorShow');
            } else {
                toastr()->error('Registro não encontrado','Falha na operação');
                return redirect()->route('ColaboradorShow');
            }
        }

        toastr()->error( 'Colaborador possui vinculo com Cargo na tabela CargoColaborador','Falha na operação');
        return redirect()->route('ColaboradorShow');
    }

    public static function showReportColaborador()
    {
        $colaboradores = Colaborador::all();
        foreach ($colaboradores as $key => $colaboradore) {
            $colaboradores[$key]['cargo'] = Cargo::find(CargoColaborador::getCargoByColaborador($colaboradore->id)->cargo_id)->cargo;
        }
        return view('relatorios.reportColaboradores', compact('colaboradores'));
    }

    public static function showReportAmountColaboradorByUnit(Request $request)
    {
        $units = Unidade::all();
        foreach ($units as $key => $unit) {
            $units[$key]['amountColaboradores'] = Colaborador::getColaboradorByUnit($unit->id)->count();
        }

        return view('relatorios.reportColaboradoresByUnit', compact('units'));
    }

    public static function reportRakingColaboradoresNote()
    {
        $colaboradores = Colaborador::all();
        foreach ($colaboradores as $key => $colaboradore) {
            $colaboradores[$key]['note'] = CargoColaborador::getNoteByColaborador($colaboradore->id);
            $colaboradores[$key]['cargo'] = Cargo::find(CargoColaborador::getCargoByColaborador($colaboradore->id)->cargo_id)->cargo;
        }
        $ordenadoDescendente = collect($colaboradores)
            ->sortByDesc('note')->values()->all();

        return view('relatorios.reportRakingColaboradores', compact('ordenadoDescendente'));
    }
}

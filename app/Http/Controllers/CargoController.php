<?php

namespace App\Http\Controllers;


use App\Cargo;
use App\CargoColaborador;
use Illuminate\Http\Request;

class CargoController extends Controller
{

    private $cargo;

    public function __construct()
    {
        $this->cargo = new Cargo();
    }

    public function index()
    {
        $cargos = Cargo::all() ?? [];
        return view('Cargo.index', compact('cargos'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Cargo::validarDados($data);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $request['cpf'] = str_replace(array('.','-','/'), "", $request->cpf);
        $this->cargo->fill($request->input());
        $this->cargo->push();
        toastr()->success('Cargo criado com sucesso','Operação realizada');
        return redirect()->route('CargoShow');
    }

    public function update(Request $request)
    {

        $cargo = cargo::findOrFail($request->id);
        $request['cpf'] = str_replace(array('.','-','/'), "", $request->cpf);
        $cargo->fill($request->input());
        $cargo->update();

        return redirect()->route('CargoShow')->with('success', 'Cargo atualizado com sucesso.');
    }

    public static function destroy(Request $request)
    {
        $cargo = cargo::find($request->id);
        if (CargoColaborador::checkBondWithCargo($request->id)) {
            if ($cargo) {
                $cargo->delete();
                toastr()->success( 'Registro excluído com sucesso','Operação realizada');
                return redirect()->route('CargoShow');
            } else {
                toastr()->error( 'Registro não encontrado','Falha na operação');
                return redirect()->route('CargoShow');
            }
        }
        toastr()->error('Registro possui vinculo ativo com colaboradores na tabela Cargo Colaborador', 'Falha na operação');
        return redirect()->route('CargoShow');
    }


}

<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\CargoColaborador;
use App\Colaborador;
use Illuminate\Http\Request;

class DesempenhoController
{
    private $desempenhoColaborator;

    public function __construct()
    {
        $this->desempenhoColaborator = new CargoColaborador();
    }

    public function index()
    {
        $desempenhoColaboratores = CargoColaborador::all() ?? [];
        return view('desempenho.index', compact('desempenhoColaboratores'));
    }

    public function create()
    {
        $colaboradores = Colaborador::colaboradoresWithoutNote();
        $cargos = Cargo::all();
        return view('desempenho.add', compact('colaboradores', 'cargos'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = CargoColaborador::validarDados($data);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->desempenhoColaborator->fill($request->input());
        $this->desempenhoColaborator->push();

        return redirect()->route('CargoColaboradorShow')->with('success', 'Desempenho do colaborador criado com sucesso.');
    }

    public static function edit($id)
    {
        $detalhes = CargoColaborador::find($id);
        $colaborador = $detalhes->colaborador_id;
        $cargo = $detalhes->cargo_id;
        $nota = $detalhes->nota_desempenho;
        $colaboradores = Colaborador::all();
        $cargos = Cargo::all();
        return view('desempenho.edit2', compact('colaborador','cargos','nota','colaboradores', 'cargo'));

    }

    public function update(Request $request)
    {

        $desempenhoColaborator = CargoColaborador::findOrFail($request->id);
        $request['cnpj'] = str_replace(array('.', '-', '/'), "", $request->cnpj);
        $desempenhoColaborator->fill($request->input());
        $desempenhoColaborator->update();

        return redirect()->route('CargoColaboradorShow')->with('success', 'Desempenho do colaborador atualizado com sucesso.');
    }

    public static function destroy(Request $request)
    {
        $desempenhoColaborator = CargoColaborador::find($request->id);

        if ($desempenhoColaborator) {
            $desempenhoColaborator->delete();
            return redirect()->route('CargoColaboradorShow')->with('success', 'Registro excluído com sucesso.');
        } else {
            return redirect()->route('CargoColaboradorShow')->with('error', 'Registro não encontrado.');
        }
    }
}

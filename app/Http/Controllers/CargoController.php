<?php

namespace App\Http\Controllers;


use App\Cargo;
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

        return redirect()->route('CargoShow')->with('success', 'Cargo criado com sucesso.');
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

        if ($cargo) {
            $cargo->delete();
            return redirect()->route('CargoShow')->with('success', 'Registro excluído com sucesso.');
        } else {
            return redirect()->route('CargoShow')->with('error', 'Registro não encontrado.');
        }
    }


}

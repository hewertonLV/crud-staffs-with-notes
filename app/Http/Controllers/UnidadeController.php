<?php

namespace App\Http\Controllers;


use App\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{

    private $unidade;

    public function __construct()
    {
        $this->unidade = new Unidade();
    }

    public function index()
    {
        $unidades = Unidade::all() ?? [];
        return view('Unidade.index', compact('unidades'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Unidade::validarDados($data);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $request['cnpj'] = str_replace(array('.','-','/'), "", $request->cnpj);
        $this->unidade->fill($request->input());
        $this->unidade->push();
        toastr()->success( 'Operação Realizada','Unidade criada com sucesso');
        return redirect()->route('UnidadeShow');
    }

    public function update(Request $request)
    {

        $unidade = unidade::findOrFail($request->id);
        $request['cnpj'] = str_replace(array('.','-','/'), "", $request->cnpj);
        $unidade->fill($request->input());
        $unidade->update();
        toastr()->success( 'Unidade atualizado com sucesso','Operação Realizada');
        return redirect()->route('UnidadeShow');
    }

    public static function destroy(Request $request)
    {
        $unidade = unidade::find($request->id);
        if (Unidade::checkBondWithStaff($request->id)){
            if ($unidade) {
                $unidade->delete();
                toastr()->success( 'Registro excluído com sucesso','Operação Realizada');
                return redirect()->route('UnidadeShow');
            } else {
                toastr()->error('Unidade '.$unidade->nome.' não encontrada','Falha na operação');
                return redirect()->route('UnidadeShow');
            }
        }else {
            toastr()->error( 'Unidade '.$unidade->nome.' possui vinculo com colaborador','Falha na operação');
            return redirect()->route('UnidadeShow');
        }

    }

}

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

        return redirect()->route('unidadeShow')->with('success', 'Unidade criado com sucesso.');
    }

    public function update(Request $request)
    {

        $unidade = unidade::findOrFail($request->id);
        $request['cnpj'] = str_replace(array('.','-','/'), "", $request->cnpj);
        $unidade->fill($request->input());
        $unidade->update();

        return redirect()->route('UnidadeShow')->with('success', 'Unidade atualizado com sucesso.');
    }

    public static function destroy(Request $request)
    {
        $unidade = unidade::find($request->id);

        if ($unidade) {
            $unidade->delete();
            return redirect()->route('UnidadeShow')->with('success', 'Registro excluído com sucesso.');
        } else {
            return redirect()->route('UnidadeShow')->with('error', 'Registro não encontrado.');
        }
    }

}

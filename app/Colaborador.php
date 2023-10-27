<?php

namespace App;

use App\Http\Controllers\DesempenhoController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Colaborador extends Model
{
    protected $table = 'colaboradors';
    protected $fillable = ['unidade_id', 'nome', 'cpf', 'email'];

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

    public function cargoColaborador()
    {
        return $this->hasMany(DesempenhoController::class);
    }

    public function inputs($colaborador)
    {
        return [
            'nome' => $colaborador->nome,
            'unidade_id' => $colaborador->unidade_id,
            'cpf' => $colaborador->cpf,
            'email' => $colaborador->email,
        ];
    }

    public static function validarDados(array $data)
    {
        return Validator::make($data, [
            'nome' => 'required',
            'unidade_id' => 'required',
            'cpf' => 'required|unique:Colaboradors,cpf',
            'email' => 'required|unique:Colaboradors,email',
        ]);
    }

    public static function colaboradoresWithoutNote(){
        $colaboradores = Colaborador::all();
        foreach ($colaboradores as $colaborador){
            $temp=CargoColaborador::getCheckCargoStaff($colaborador)[0] ?? [];
            if (empty($temp)){
                $listColaborador[] = $colaborador;
            }
        }
        return $listColaborador ?? [];
    }

    public static function getColaboradorByUnit($id_unit){
        return Colaborador::where('unidade_id' , $id_unit)->get();
    }

    public function value()
    {
        return $this->id;
    }

    public function label()
    {
        return $this->nome;
    }
    use SoftDeletes;
}

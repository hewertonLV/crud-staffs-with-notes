<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class CargoColaborador extends Model
{
    protected $table = 'cargo_colaborador';
    protected $fillable = ['cargo_id', 'colaborador_id', 'nota_desempenho'];


    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public static function validarDados(array $data)
    {
        return Validator::make($data, [
            'cargo_id' => 'required',
            'colaborador_id' => 'required',
            'nota_desempenho' => 'required',

        ]);
    }

    public static function getCheckCargoStaff($colaborador){
        $check = CargoColaborador::where('colaborador_id',$colaborador->id)->get();
        return $check;
    }

    public static function getCheckStaffWithoutJob(){
        $colaboradores = Colaborador::all();
        foreach ($colaboradores as $colaboradore) {
            if (empty(self::getCheckCargoStaff($colaboradore)[0])) {
                return $colaboradore;
            }
        }
    }

    public static function  getCargoByColaborador($idColaborador){
        $cargoColaborador = CargoColaborador::where('colaborador_id',$idColaborador)->get();
        return $cargoColaborador[0];
    }

    public static function getNoteByColaborador($idColaborador){
        $cargoColaborador = CargoColaborador::where('colaborador_id',$idColaborador)->pluck('nota_desempenho');
        return $cargoColaborador[0];
    }

    use SoftDeletes;
}

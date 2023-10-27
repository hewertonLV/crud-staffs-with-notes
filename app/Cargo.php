<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Cargo extends Model
{
    protected $fillable = ['cargo'];

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }

    public function cargoColaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }
    public function inputs($cargo)
    {
        return [
            'cargo' => $cargo->cargo,
        ];
    }
    public static function validarDados(array $data)
    {
        return Validator::make($data, [
            'cargo' => 'required'
        ]);
    }
    public function value()
    {
        return $this->id;
    }

    public function label()
    {
        return $this->cargo;
    }


    use SoftDeletes;

}

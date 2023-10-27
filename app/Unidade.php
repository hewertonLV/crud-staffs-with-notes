<?php

namespace App;

use Faker\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Validation\Rule;


class Unidade extends Model
{
    protected $fillable = ['nome_fantasia', 'razao_social', 'cnpj'];

    public function colaborador()
    {
        return $this->hasMany(Colaborador::class);
    }

    private $attribute = [
        'nome_fantasia' => 'Nome',
        'razao_social' => 'Razão Social',
        'cnpj' => 'CNPJ',
    ];

    public static function validarDados(array $data)
    {
        return \Illuminate\Support\Facades\Validator::make($data, [
            'nome_fantasia' => 'required',
            'razao_social' => 'required',
            'cnpj' => 'required',

        ]);
    }
    public static function checkBondWithStaff($id_Unit)
    {
        $status = Colaborador::where('unidade_id', $id_Unit)->get()->count();
        if ($status == 0) {
            return false;
        }
        return true;
    }

    public function value()
    {
        return $this->id;
    }

    public function label()
    {
        return $this->nome_fantasia;
    }

    use SoftDeletes;
}

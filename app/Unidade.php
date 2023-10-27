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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    use HasFactory;

    protected $table = 'lojas';

    protected $fillable = [
        'razao_social',
        'nome_fantasia',
        'cnpj',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cep',
        'cidade',
        'estado',
        'pais',
    ];
}

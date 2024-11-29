<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemDeServico extends Model
{
    use HasFactory;

    protected $table = 'ordem_de_servico';

    protected $fillable = [
        'OS_IDENTIFICACAO',
        'OS_TIPO',
        'OS_DATA_ENTRADA',
        'OS_CLITENTE_RESPONSAVEL',
        'OS_FUNCIONARIO_RESPONSAVEL',
        'OS_DATA_PREVISAO',
    ];
}
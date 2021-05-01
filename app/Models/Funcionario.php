<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome',
        'endereco',
        'email',
        'telefone'
    ];

    protected $table = 'Funcionario';

    /*

    É POSSIVEL MUDAR A CHAVE PRIMARIA
    protected $primaryKey = 'nome_da_pk';

    SE NÃO QUISER QUE SEJA AUTO_INCREMENT
    public $increment = false

    PARA DEFINIR O TIPO
    protected $keyType = 'string';

    PARA TIRAR OS CAMPOS TIMESTAMPS
    public $timestamps = false;

    */
}

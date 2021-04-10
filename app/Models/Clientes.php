<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nome', 'endereco', 'email', 'nascimento'];
    protected $table = 'Clientes';

    public function vendas(){
        //Vendas:: (destino), class (pega toda a classe)
        //cliente_id esta relacioando na model vendas
        return $this->hasMany( Vendas::class, 'cliente_id' );

    }
}

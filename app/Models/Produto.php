<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'desc', 'preco'];
    protected $table = 'Produto';

    public function produto()
    {
        return $this->hasMany( Produtos::class, 'produto_id' );
    }
}

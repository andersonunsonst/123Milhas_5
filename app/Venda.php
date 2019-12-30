<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';

    protected $fillable = [
        'telefone', 'endereco', 'preco', 'pizza_id',
    ];
}

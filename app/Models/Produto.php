<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'preço_venda',
        'estoque_minimo',
        'estoque_maximo',
        'fornecedor_id'
    ];

    /**
     * Relacionamento: Produto pertence a um Fornecedor
     */
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}

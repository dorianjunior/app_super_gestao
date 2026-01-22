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
        'fornecedor_id'
    ];

    /**
     * Relacionamento: Produto pertence a um Fornecedor
     */
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    /**
     * Relacionamento: Produto tem muitos ProdutoFiliais
     */
    public function produtoFiliais()
    {
        return $this->hasMany(ProdutoFilial::class);
    }

    /**
     * Relacionamento: Produto pertence a muitas Filiais
     */
    public function filiais()
    {
        return $this->belongsToMany(Filial::class, 'produto_filiais')
                    ->withPivot('preco_venda', 'estoque_minimo', 'estoque_maximo')
                    ->withTimestamps();
    }
}

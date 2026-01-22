<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    use HasFactory;

    protected $table = 'filiais';

    protected $fillable = [
        'filial'
    ];

    /**
     * Relacionamento: Filial tem muitos ProdutoFiliais
     */
    public function produtoFiliais()
    {
        return $this->hasMany(ProdutoFilial::class);
    }

    /**
     * Relacionamento: Filial tem muitos Produtos através de ProdutoFilial
     */
    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produto_filiais')
                    ->withPivot('preco_venda', 'estoque_minimo', 'estoque_maximo')
                    ->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoFilial extends Model
{
    use HasFactory;

    protected $table = 'produto_filiais';

    protected $fillable = [
        'produto_id',
        'filial_id',
        'preco_venda',
        'estoque_minimo',
        'estoque_maximo'
    ];

    protected $casts = [
        'preco_venda' => 'decimal:2',
        'estoque_minimo' => 'integer',
        'estoque_maximo' => 'integer'
    ];

    /**
     * Relacionamento: ProdutoFilial pertence a um Produto
     */
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    /**
     * Relacionamento: ProdutoFilial pertence a uma Filial
     */
    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }
}

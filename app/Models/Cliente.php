<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'telefone',
        'endereco',
        'cidade',
        'uf',
        'cep',
        'user_id'
    ];

    /**
     * Relacionamento: Cliente pertence a um User (quem cadastrou)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

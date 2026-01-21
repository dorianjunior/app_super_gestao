<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contatos = [
            [
                'nome' => 'João Silva',
                'telefone' => '(11) 98765-4321',
                'email' => 'joao.silva@email.com',
                'motivo_contato' => 1,
                'mensagem' => 'Gostaria de saber mais informações sobre os produtos disponíveis.',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5)
            ],
            [
                'nome' => 'Maria Santos',
                'telefone' => '(21) 97654-3210',
                'email' => 'maria.santos@email.com',
                'motivo_contato' => 2,
                'mensagem' => 'Preciso de um orçamento para compra de notebooks em grande quantidade.',
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(4)
            ],
            [
                'nome' => 'Carlos Oliveira',
                'telefone' => '(31) 99876-5432',
                'email' => 'carlos.oliveira@email.com',
                'motivo_contato' => 1,
                'mensagem' => 'Qual o prazo de entrega para a região de Minas Gerais?',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3)
            ],
            [
                'nome' => 'Ana Paula Costa',
                'telefone' => '(41) 98123-4567',
                'email' => 'ana.costa@email.com',
                'motivo_contato' => 3,
                'mensagem' => 'Tive um problema com o produto adquirido. Preciso de suporte.',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'nome' => 'Pedro Alves',
                'telefone' => '(51) 97234-5678',
                'email' => 'pedro.alves@email.com',
                'motivo_contato' => 2,
                'mensagem' => 'Vocês trabalham com parceria para revendedores?',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1)
            ],
            [
                'nome' => 'Juliana Ferreira',
                'telefone' => '(85) 96345-6789',
                'email' => 'juliana.ferreira@email.com',
                'motivo_contato' => 1,
                'mensagem' => 'Quais são as formas de pagamento aceitas?',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        foreach ($contatos as $contato) {
            DB::table('site_contatos')->insert($contato);
        }
    }
}

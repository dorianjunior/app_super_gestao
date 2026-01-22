<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoDetalheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detalhes = [
            [
                'produto_id' => 1,
                'comprimento' => 35.80,
                'largura' => 24.90,
                'altura' => 2.00,
                'unidade_id' => 7, // CM
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'produto_id' => 2,
                'comprimento' => 11.50,
                'largura' => 6.20,
                'altura' => 4.00,
                'unidade_id' => 7, // CM
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'produto_id' => 3,
                'comprimento' => 44.00,
                'largura' => 13.50,
                'altura' => 4.20,
                'unidade_id' => 7, // CM
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'produto_id' => 4,
                'comprimento' => 61.30,
                'largura' => 45.50,
                'altura' => 18.50,
                'unidade_id' => 7, // CM
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'produto_id' => 5,
                'comprimento' => 75.00,
                'largura' => 70.00,
                'altura' => 130.00,
                'unidade_id' => 7, // CM
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'produto_id' => 6,
                'comprimento' => 17.50,
                'largura' => 18.00,
                'altura' => 8.50,
                'unidade_id' => 7, // CM
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'produto_id' => 7,
                'comprimento' => 10.00,
                'largura' => 7.00,
                'altura' => 0.70,
                'unidade_id' => 7, // CM
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'produto_id' => 8,
                'comprimento' => 9.50,
                'largura' => 7.10,
                'altura' => 5.20,
                'unidade_id' => 7, // CM
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        foreach ($detalhes as $detalhe) {
            DB::table('produto_detalhes')->updateOrInsert(
                ['produto_id' => $detalhe['produto_id']],
                $detalhe
            );
        }
    }
}

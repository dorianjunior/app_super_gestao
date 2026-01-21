<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoFilialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtoFiliais = [];

        // Para cada produto (1 a 8)
        for ($produtoId = 1; $produtoId <= 8; $produtoId++) {
            // Para cada filial (1 a 5)
            for ($filialId = 1; $filialId <= 5; $filialId++) {
                $produtoFiliais[] = [
                    'produto_id' => $produtoId,
                    'filial_id' => $filialId,
                    'preco_venda' => rand(5000, 500000) / 100, // Preço entre 50.00 e 5000.00
                    'estoque_minimo' => rand(5, 20),
                    'estoque_maximo' => rand(50, 200),
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        foreach ($produtoFiliais as $produtoFilial) {
            DB::table('produto_filiais')->insert($produtoFilial);
        }
    }
}

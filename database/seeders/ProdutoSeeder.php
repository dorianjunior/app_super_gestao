<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtos = [
            [
                'nome' => 'Notebook Dell Inspiron 15',
                'descricao' => 'Notebook com processador Intel Core i7, 16GB RAM, SSD 512GB',
                'peso' => 2000,
                'unidade_id' => 1, // Unidade
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Mouse Wireless Logitech',
                'descricao' => 'Mouse sem fio com tecnologia Bluetooth',
                'peso' => 100,
                'unidade_id' => 1, // Unidade
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Teclado Mecânico RGB',
                'descricao' => 'Teclado mecânico com iluminação RGB personalizável',
                'peso' => 800,
                'unidade_id' => 1, // Unidade
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Monitor LG 27 Polegadas',
                'descricao' => 'Monitor LED Full HD com tecnologia IPS',
                'peso' => 5000,
                'unidade_id' => 1, // Unidade
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Cadeira Gamer Pro',
                'descricao' => 'Cadeira ergonômica com ajuste de altura e encosto reclinável',
                'peso' => 18000,
                'unidade_id' => 1, // Unidade
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Headset HyperX Cloud',
                'descricao' => 'Fone de ouvido gamer com microfone removível',
                'peso' => 300,
                'unidade_id' => 1, // Unidade
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'SSD Kingston 1TB',
                'descricao' => 'Unidade de estado sólido SATA III',
                'peso' => 50,
                'unidade_id' => 1, // Unidade
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Webcam Logitech Full HD',
                'descricao' => 'Câmera web 1080p com microfone integrado',
                'peso' => 200,
                'unidade_id' => 1, // Unidade
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        foreach ($produtos as $produto) {
            DB::table('produtos')->insert($produto);
        }
    }
}

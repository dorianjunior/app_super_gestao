<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades')->insert([
            ['unidade' => 'UN', 'descricao' => 'Unidade', 'created_at' => now(), 'updated_at' => now()],
            ['unidade' => 'KG', 'descricao' => 'Quilograma', 'created_at' => now(), 'updated_at' => now()],
            ['unidade' => 'G', 'descricao' => 'Grama', 'created_at' => now(), 'updated_at' => now()],
            ['unidade' => 'L', 'descricao' => 'Litro', 'created_at' => now(), 'updated_at' => now()],
            ['unidade' => 'ML', 'descricao' => 'Mililitro', 'created_at' => now(), 'updated_at' => now()],
            ['unidade' => 'M', 'descricao' => 'Metro', 'created_at' => now(), 'updated_at' => now()],
            ['unidade' => 'CM', 'descricao' => 'Centímetro', 'created_at' => now(), 'updated_at' => now()],
            ['unidade' => 'MM', 'descricao' => 'Milímetro', 'created_at' => now(), 'updated_at' => now()],
            ['unidade' => 'CX', 'descricao' => 'Caixa', 'created_at' => now(), 'updated_at' => now()],
            ['unidade' => 'PCT', 'descricao' => 'Pacote', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

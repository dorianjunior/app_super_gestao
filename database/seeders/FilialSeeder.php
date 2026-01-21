<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filiais')->insert([
            ['filial' => 'Matriz São Paulo', 'created_at' => now(), 'updated_at' => now()],
            ['filial' => 'Filial Rio de Janeiro', 'created_at' => now(), 'updated_at' => now()],
            ['filial' => 'Filial Belo Horizonte', 'created_at' => now(), 'updated_at' => now()],
            ['filial' => 'Filial Curitiba', 'created_at' => now(), 'updated_at' => now()],
            ['filial' => 'Filial Porto Alegre', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

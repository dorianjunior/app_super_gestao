<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Ordem de execução importante devido aos relacionamentos
        $this->call([
            UnidadeSeeder::class,
            FornecedorSeeder::class,
            FilialSeeder::class,
            ProdutoSeeder::class,
            ProdutoDetalheSeeder::class,
            ProdutoFilialSeeder::class,
            SiteContatoSeeder::class,
        ]);
    }
}

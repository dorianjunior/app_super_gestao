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
            // Primeiro: Usuários (necessário para clientes)
            UserSeeder::class,

            // Estrutura básica
            UnidadeSeeder::class,
            FornecedorSeeder::class,
            FilialSeeder::class,

            // Produtos e detalhes
            ProdutoSeeder::class,
            ProdutoDetalheSeeder::class,
            ProdutoFilialSeeder::class,

            // Clientes e contatos
            ClienteSeeder::class,
            SiteContatoSeeder::class,
        ]);

        $this->command->info('');
        $this->command->info('========================================');
        $this->command->info('  ✓ Database populado com sucesso!');
        $this->command->info('========================================');
    }
}

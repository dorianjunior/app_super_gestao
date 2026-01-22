<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@supergestao.com.br'],
            [
                'name' => 'Administrador do Sistema',
                'email' => 'admin@supergestao.com.br',
                'password' => Hash::make('123456'),
            ]
        );

        // Gerente
        User::updateOrCreate(
            ['email' => 'gerente@supergestao.com.br'],
            [
                'name' => 'João Silva',
                'email' => 'gerente@supergestao.com.br',
                'password' => Hash::make('123456'),
            ]
        );

        // Usuários comuns
        User::updateOrCreate(
            ['email' => 'maria@supergestao.com.br'],
            [
                'name' => 'Maria Santos',
                'email' => 'maria@supergestao.com.br',
                'password' => Hash::make('123456'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'pedro@supergestao.com.br'],
            [
                'name' => 'Pedro Oliveira',
                'email' => 'pedro@supergestao.com.br',
                'password' => Hash::make('123456'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'ana@supergestao.com.br'],
            [
                'name' => 'Ana Costa',
                'email' => 'ana@supergestao.com.br',
                'password' => Hash::make('123456'),
            ]
        );

        // Atualizar roles se a coluna existir
        try {
            User::where('email', 'admin@supergestao.com.br')->update(['role' => 'admin']);
            User::where('email', 'gerente@supergestao.com.br')->update(['role' => 'gerente']);
            User::whereIn('email', ['maria@supergestao.com.br', 'pedro@supergestao.com.br', 'ana@supergestao.com.br'])
                ->update(['role' => 'user']);
        } catch (\Exception $e) {
            $this->command->warn('Coluna role ainda não existe. Execute as migrations primeiro.');
        }

        $this->command->info('✓ 5 usuários criados com sucesso!');
        $this->command->info('  - Admin: admin@supergestao.com.br / 123456');
        $this->command->info('  - Gerente: gerente@supergestao.com.br / 123456');
        $this->command->info('  - Usuários: maria@, pedro@, ana@ / 123456');
    }
}

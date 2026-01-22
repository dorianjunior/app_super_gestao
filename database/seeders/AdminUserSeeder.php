<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@supergestao.com.br'],
            [
                'name' => 'Administrador',
                'email' => 'admin@supergestao.com.br',
                'password' => Hash::make('123456'),
            ]
        );

        $this->command->info('Usuário admin criado com sucesso!');
        $this->command->info('Email: admin@supergestao.com.br');
        $this->command->info('Senha: 123456');
    }
}

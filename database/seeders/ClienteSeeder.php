<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\User;
use Faker\Factory as Faker;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');

        // Pegar usuários existentes
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->error('Nenhum usuário encontrado. Execute UserSeeder primeiro.');
            return;
        }

        // Estados brasileiros
        $estados = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];

        // Cidades por estado (alguns exemplos)
        $cidadesPorEstado = [
            'SP' => ['São Paulo', 'Campinas', 'Santos', 'Ribeirão Preto', 'Sorocaba', 'São José dos Campos'],
            'RJ' => ['Rio de Janeiro', 'Niterói', 'Campos dos Goytacazes', 'Petrópolis', 'Nova Iguaçu'],
            'MG' => ['Belo Horizonte', 'Uberlândia', 'Contagem', 'Juiz de Fora', 'Betim'],
            'RS' => ['Porto Alegre', 'Caxias do Sul', 'Pelotas', 'Canoas', 'Santa Maria'],
            'PR' => ['Curitiba', 'Londrina', 'Maringá', 'Ponta Grossa', 'Cascavel'],
            'SC' => ['Florianópolis', 'Joinville', 'Blumenau', 'Chapecó', 'Itajaí'],
            'BA' => ['Salvador', 'Feira de Santana', 'Vitória da Conquista', 'Camaçari', 'Ilhéus'],
            'PE' => ['Recife', 'Jaboatão dos Guararapes', 'Olinda', 'Caruaru', 'Petrolina'],
            'CE' => ['Fortaleza', 'Caucaia', 'Juazeiro do Norte', 'Maracanaú', 'Sobral'],
            'GO' => ['Goiânia', 'Aparecida de Goiânia', 'Anápolis', 'Rio Verde', 'Luziânia'],
        ];

        $this->command->info('Criando 50 clientes...');

        for ($i = 0; $i < 50; $i++) {
            $uf = $faker->randomElement($estados);
            $cidade = isset($cidadesPorEstado[$uf])
                ? $faker->randomElement($cidadesPorEstado[$uf])
                : $faker->city;

            Cliente::create([
                'nome' => $faker->name,
                'cpf' => $this->gerarCPF(),
                'email' => $faker->unique()->safeEmail,
                'telefone' => $faker->cellphoneNumber,
                'endereco' => $faker->streetAddress,
                'cidade' => $cidade,
                'uf' => $uf,
                'cep' => $faker->postcode,
                'user_id' => $users->isNotEmpty() ? $users->random()->id : null,
            ]);
        }

        $this->command->info('✓ 50 clientes criados com sucesso!');
    }

    /**
     * Gerar CPF válido
     */
    private function gerarCPF()
    {
        $n1 = rand(0, 9);
        $n2 = rand(0, 9);
        $n3 = rand(0, 9);
        $n4 = rand(0, 9);
        $n5 = rand(0, 9);
        $n6 = rand(0, 9);
        $n7 = rand(0, 9);
        $n8 = rand(0, 9);
        $n9 = rand(0, 9);

        $d1 = $n9 * 2 + $n8 * 3 + $n7 * 4 + $n6 * 5 + $n5 * 6 + $n4 * 7 + $n3 * 8 + $n2 * 9 + $n1 * 10;
        $d1 = 11 - ($d1 % 11);
        if ($d1 >= 10) $d1 = 0;

        $d2 = $d1 * 2 + $n9 * 3 + $n8 * 4 + $n7 * 5 + $n6 * 6 + $n5 * 7 + $n4 * 8 + $n3 * 9 + $n2 * 10 + $n1 * 11;
        $d2 = 11 - ($d2 % 11);
        if ($d2 >= 10) $d2 = 0;

        return sprintf('%d%d%d.%d%d%d.%d%d%d-%d%d', $n1, $n2, $n3, $n4, $n5, $n6, $n7, $n8, $n9, $d1, $d2);
    }
}

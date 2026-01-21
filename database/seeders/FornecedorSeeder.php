<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedores = [
            [
                'nome' => 'Fornecedor ABC Ltda',
                'site' => 'https://www.fornecedorabc.com.br',
                'uf' => 'SP',
                'email' => 'contato@fornecedorabc.com.br',
            ],
            [
                'nome' => 'Distribuidora XYZ S/A',
                'site' => 'https://www.distribuidoraxyz.com.br',
                'uf' => 'RJ',
                'email' => 'vendas@distribuidoraxyz.com.br',
            ],
            [
                'nome' => 'Importadora Global',
                'site' => 'https://www.importadoraglobal.com.br',
                'uf' => 'MG',
                'email' => 'importacao@global.com.br',
            ],
            [
                'nome' => 'Comércio Nacional',
                'site' => 'https://www.comercionacional.com.br',
                'uf' => 'RS',
                'email' => 'compras@comercionacional.com.br',
            ],
            [
                'nome' => 'Suprimentos Tech',
                'site' => 'https://www.suprimentostech.com.br',
                'uf' => 'SC',
                'email' => 'tech@suprimentostech.com.br',
            ],
            [
                'nome' => 'Atacado Brasil',
                'site' => null,
                'uf' => 'BA',
                'email' => 'atacado@brasilatacado.com.br',
            ],
            [
                'nome' => 'Central de Produtos',
                'site' => 'https://www.centraldeprodutos.com.br',
                'uf' => 'PR',
                'email' => 'central@centralprodutos.com.br',
            ],
            [
                'nome' => 'Indústria Moderna',
                'site' => 'https://www.industriamoderna.com.br',
                'uf' => 'SP',
                'email' => 'industrial@moderna.com.br',
            ],
        ];

        foreach ($fornecedores as $fornecedor) {
            Fornecedor::create($fornecedor);
        }
    }
}

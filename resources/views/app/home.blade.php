@extends('app.layouts.basico')

@section('titulo', 'Dashboard')

@section('conteudo')
    <div style="text-align: center; padding: 40px 0;">
        <h2>Bem-vindo ao Sistema de Gestão!</h2>
        <p style="color: #7f8c8d; font-size: 16px; margin-top: 20px;">
            Use o menu lateral para navegar entre as funcionalidades do sistema.
        </p>

        <div style="display: flex; justify-content: space-around; margin-top: 40px; flex-wrap: wrap;">
            <div style="background-color: #3498db; color: white; padding: 30px; border-radius: 8px; width: 200px; margin: 10px;">
                <h3 style="margin: 0 0 10px 0; font-size: 36px;">{{ $totalFornecedores ?? 0 }}</h3>
                <p style="margin: 0;">Fornecedores</p>
            </div>

            <div style="background-color: #2ecc71; color: white; padding: 30px; border-radius: 8px; width: 200px; margin: 10px;">
                <h3 style="margin: 0 0 10px 0; font-size: 36px;">{{ $totalProdutos ?? 0 }}</h3>
                <p style="margin: 0;">Produtos</p>
            </div>

            <div style="background-color: #e74c3c; color: white; padding: 30px; border-radius: 8px; width: 200px; margin: 10px;">
                <h3 style="margin: 0 0 10px 0; font-size: 36px;">{{ $totalClientes ?? 0 }}</h3>
                <p style="margin: 0;">Clientes</p>
            </div>
        </div>
    </div>
@endsection

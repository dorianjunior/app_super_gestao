<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Adicionar coluna fornecedor_id na tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('fornecedor_id')->nullable()->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedors')->onDelete('set null');
        });

        // Adicionar coluna user_id na tabela clientes (responsável pelo cadastro)
        Schema::table('clientes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });

        // Adicionar role na tabela users
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 50)->default('user')->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign(['fornecedor_id']);
            $table->dropColumn('fornecedor_id');
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};

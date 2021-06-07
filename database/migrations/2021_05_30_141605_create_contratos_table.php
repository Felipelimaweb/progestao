<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('contratos', function (Blueprint $table) {
            $table->bigIncrements( column:'id');
            $table->foreignId('cliente_id')->nullable()->constrained();
            $table->foreignId('prestador_id')->nullable()->constrained();
            $table->foreignId('fornecedor_id')->nullable()->constrained();
            $table->foreignId('funcionario_id')->nullable()->constrained();
            $table->string( column:'nome');
            $table->string( column:'data');
            $table->string( column:'tipo');
            $table->string( column:'objeto');
            $table->string( column:'ciclo');
            $table->string( column:'valor');
            $table->timestamps();
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}

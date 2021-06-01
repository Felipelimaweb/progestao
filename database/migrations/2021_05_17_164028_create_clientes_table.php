<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements( column:'id');
            $table->string( column:'sede');
            $table->string( column:'nome');
            $table->string( column:'cnpj');
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
        Schema::dropIfExists('clientes');
    }
}

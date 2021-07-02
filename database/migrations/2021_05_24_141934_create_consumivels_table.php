<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumivelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumivels', function (Blueprint $table) {
            $table->bigIncrements( column:'id');
            $table->string('sede');
            $table->string('nome');
            $table->string('data');
            $table->string('valor');
            $table->string('notafiscal');
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
        Schema::dropIfExists('consumivels');
    }
}

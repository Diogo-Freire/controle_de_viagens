<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->year('ano');
            $table->date('data_aquisicao');
            $table->integer('km_aquisicao');
            $table->string('renavam')->unique();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

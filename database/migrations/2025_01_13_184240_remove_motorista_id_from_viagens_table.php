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
        Schema::table('viagens', function (Blueprint $table) {
            $table->dropForeign(['motorista_id']); // Remove a chave estrangeira
            $table->dropColumn('motorista_id'); // Remove o campo
        });
    }

    public function down()
    {
        Schema::table('viagens', function (Blueprint $table) {
            $table->foreignId('motorista_id')->constrained()->onDelete('cascade');
        });
    }

};

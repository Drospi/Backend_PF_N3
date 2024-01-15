<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id('idpersona');
            $table->string('primernombre');
            $table->string('segundonombre');
            $table->string('primerapellido');
            $table->string('segundoapellido');
            $table->date('fechacreacion');
            $table->date('fechamodificacion')->nullable();
            $table->string('usuariocreacion');
            $table->string('usuariomodificacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};

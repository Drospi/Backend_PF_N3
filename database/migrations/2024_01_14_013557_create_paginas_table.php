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
        Schema::create('paginas', function (Blueprint $table) {
            $table->id('idpagina');
            $table->date('fechacreacion');
            $table->date('fechamodificacion');
            $table->string('usuariocreacion');
            $table->string('usuariomodificacion');
            $table->string('url');
            $table->string('icono');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('estado');
            $table->string('tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paginas');
    }
};

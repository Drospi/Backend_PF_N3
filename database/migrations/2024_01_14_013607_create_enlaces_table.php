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
        Schema::create('enlaces', function (Blueprint $table) {
            $table->id('idenlace');
            $table->foreignId('idpagina')->constrained('paginas','idpagina')->onDelete('cascade');
            $table->foreignId('idrol')->constrained('roles','idrol')->onDelete('cascade');
            $table->string('descripcion');
            $table->date('fechacreacion');
            $table->date('fechamodificacion');
            $table->string('usuariocreacion');
            $table->string('usuariomodificacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enlaces');
    }
};

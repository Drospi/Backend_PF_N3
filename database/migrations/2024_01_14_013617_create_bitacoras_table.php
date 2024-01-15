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
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id('idbitacora');
            $table->foreignId('idusuario')->nullable()->constrained('usuarios','idusuario')->onDelete('set null')->onUpdate('cascade');
            $table->string('bitacora');
            $table->date('fecha');
            $table->time('hora');
            $table->string('ip');
            $table->string('os');
            $table->string('navegador');
            $table->string('usuario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacoras');
    }
};

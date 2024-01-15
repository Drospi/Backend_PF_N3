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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('idusuario');
            $table->foreignId('idpersona')->nullable()->constrained('personas', 'idpersona')->onDelete('cascade');
            $table->foreignId('idrol')->nullable()->constrained('roles', 'idrol')->onDelete('set null');
            $table->string('usuario')->unique();
            $table->string('clave');
            $table->boolean('habilitado')->default(false);
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
        Schema::dropIfExists('usuarios');
    }
};

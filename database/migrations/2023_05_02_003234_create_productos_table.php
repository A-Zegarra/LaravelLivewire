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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('codigo')->unique();
            $table->integer('caja')->nullable();
            $table->decimal('costo');
            $table->decimal('precioMenor')->nullable();
            $table->decimal('precioMayor')->nullable();
            $table->string('origen')->nullable();
            $table->binary('imagen')->nullable();
            $table->foreignId('id_categoria')->nullable()->constrained('categorias')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

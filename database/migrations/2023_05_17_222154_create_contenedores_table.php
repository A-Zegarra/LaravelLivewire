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
        Schema::create('contenedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->date('fecha')->nullable();
            $table->decimal('yuan',8,2)->nullable();
            $table->decimal('dolar',8,2)->nullable();
            $table->decimal('gasto1',8,2)->nullable();
            $table->decimal('gasto2',8,2)->nullable();
            $table->decimal('gasto3',8,2)->nullable();
            $table->decimal('gasto4',8,2)->nullable();
            $table->foreignId('id_proveedor')->nullable()->constrained('proveedores')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenedores');
    }
};

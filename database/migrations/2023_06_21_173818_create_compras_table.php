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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->string('tipoComprobante')->nullable();
            $table->string('serie')->nullable();
            $table->string('numero')->nullable();
            $table->string('moneda')->nullable();
            $table->string('ruc')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->string('documento')->nullable();
            $table->string('razonsocial')->nullable();
            $table->string('direccion')->nullable();
            $table->string('celular')->nullable();
            $table->string('descuento')->nullable();
            $table->string('metodo_pago')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};

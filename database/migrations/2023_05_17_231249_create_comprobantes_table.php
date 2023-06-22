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
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_documento', ['factura', 'boleta', 'nota']);
            $table->date('fecha');
            $table->string('serie');
            $table->unsignedInteger('numero');
            $table->string('moneda');
            $table->string('ruc');
            $table->enum('tipo_cliente', ['persona', 'empresa']);
            $table->string('nombre_cliente');
            $table->string('direccion_cliente');
            $table->string('celular_cliente');
            $table->decimal('descuento', 8, 2);
            $table->enum('metodo_pago', ['efectivo', 'tarjeta']);
            $table->text('observaciones');
            $table->decimal('total', 8, 2);
            $table->timestamps();

            $table->foreignId('id_tipocomprobante')->nullable()->constrained('tipo_comprobantes')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_cliente')->nullable()->constrained('clientes')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('id_usuario')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprobante');
    }
};

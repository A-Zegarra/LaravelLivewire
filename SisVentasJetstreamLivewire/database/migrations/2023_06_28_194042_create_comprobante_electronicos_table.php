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
        Schema::create('comprobante_electronicos', function (Blueprint $table) {
            $table->id();

            $table->string('serie');
            $table->string('numero');
            $table->date('fecha_emision');
            $table->string('estado');

            $table->unsignedBigInteger('venta_id');

            $table->foreign('venta_id')
                ->references('id')
                ->on('ventas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprobante_electronicos');
    }
};

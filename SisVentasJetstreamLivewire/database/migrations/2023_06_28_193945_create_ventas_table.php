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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->decimal('total_neto', 10, 2);
            $table->decimal('total_impuestos', 10, 2);
            $table->decimal('total_bruto', 10, 2);

            $table->unsignedBigInteger('cliente_id')->nullable();

            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
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
        Schema::dropIfExists('ventas');
    }
};

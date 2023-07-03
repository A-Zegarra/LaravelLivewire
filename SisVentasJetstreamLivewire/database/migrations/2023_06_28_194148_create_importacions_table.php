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
        Schema::create('importacions', function (Blueprint $table) {
            $table->id();

            $table->date('fecha_importacion');
            $table->decimal('total_gasto', 10, 2);

            $table->unsignedBigInteger('proveedor_id');

            $table->foreign('proveedor_id')
                ->references('id')
                ->on('proveedors');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('importacions');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_importacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('cantidad');
            $table->decimal('costo_unitario', 10, 2);

            $table->unsignedBigInteger('importacion_id');
            $table->unsignedBigInteger('producto_id');

            $table->foreign('importacion_id')
                ->references('id')
                ->on('importacions')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('producto_id')
                ->references('id')
                ->on('productos')
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
        Schema::dropIfExists('detalle_importacions');
    }
};

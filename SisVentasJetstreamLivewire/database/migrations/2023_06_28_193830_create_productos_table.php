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
            
            $table->string('codigo')->unique();
            $table->string('descripcion');
            $table->integer('cantidad_caja')->nullable();
            $table->decimal('costo', 10, 2);
            $table->decimal('precio_menor', 10, 2)->nullable();
            $table->decimal('precio_mayor', 10, 2)->nullable();
            $table->string('tipo_medida')->nullable();
            $table->string('foto')->nullable();

            $table->unsignedBigInteger('categoria_id')->nullable();

            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias')
                ->onDelete('set null');

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

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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //Integer unsigned increment
            $table->string('name'); //varchar ('name',100) o text('name')
            $table->string('email')->unique(); //unique unico ingreso
            $table->timestamp('email_verified_at')->nullable(); // timestamp (fechas) - nullable() campo que puede ser vacio
            $table->string('password'); //constrase{as}
            $table->rememberToken(); //columna varchar de tamaño 100 para tokens
            $table->timestamps(); //timestamps created_at updated_at se actualizan las fechas
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

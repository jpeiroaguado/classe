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
        Schema::create('photo_days', Function(Blueprint $table){
            $table->id();
            $table->string('titulo');
            $table->text('descripción');
            $table->string('imagen')->nullable();
            $table->string('usuario_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_days');
    }
};/*No he arribat a crear el seeder per la vista*/

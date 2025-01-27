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
        Schema::create('dispositius', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('descripcio')->nullable();
            $table->set('estat', ['operatiu', 'reparació', 'baixa']);
            $table->unsignedBigInteger('ubicacio_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositius');
    }
};

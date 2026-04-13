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
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->string('marca', 50)->nullable(false);
            $table->string('modelo', 50)->nullable(false);
            $table->year('ano');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('carros');
    }
};

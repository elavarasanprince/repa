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
        Schema::create('energysources', function (Blueprint $table) {
            $table->id();
            $table->date('date');  // Date field
            $table->decimal('central_grid', 10, 2)->nullable();
            $table->decimal('bio_co_gen', 10, 2)->nullable();
            $table->decimal('solar', 10, 2)->nullable();
            $table->decimal('wind', 10, 2)->nullable();
            $table->decimal('gas_naptha', 10, 2)->nullable();
            $table->decimal('hydro', 10, 2)->nullable();
            $table->decimal('thermal', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('energy_sources');
    }
};

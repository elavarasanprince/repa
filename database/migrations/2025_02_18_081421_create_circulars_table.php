<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('circulars', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Circular Name
            $table->string('pdf'); // PDF File Path
            $table->string('link'); // PDF File Path
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status
            $table->timestamps(); // Created_at and Updated_at timestamps
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('circulars');
    }
};

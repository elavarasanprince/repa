<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->string('venue');
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable(); // Cover Image
            $table->json('event_images')->nullable(); // Multiple Event Images
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('events');
    }
};


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('availability_demandmets', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->float('availability')->default(0);
            $table->float('demand_met')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('availability_demandmets');
    }
};


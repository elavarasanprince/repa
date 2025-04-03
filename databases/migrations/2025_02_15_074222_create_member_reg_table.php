<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('member_reg', function (Blueprint $table) {
            $table->id();
            $table->string('member_name');
            $table->string('father_name')->nullable();
            $table->string('aadhar_number')->unique();
            $table->string('designation')->nullable();
            $table->string('oftheCompany')->nullable();
            $table->text('address')->nullable();
            $table->string('pincode', 10)->nullable();
            $table->string('district')->nullable();
            $table->string('gstin')->nullable();
            $table->string('url')->nullable();
            $table->string('email')->unique();
            $table->string('contactno')->nullable();
            $table->string('whatsappgrp')->nullable();
            $table->string('wcontact')->nullable();
            $table->string('menbertasma')->nullable();

            // Primary Contact
            $table->string('primary_name')->nullable();
            $table->string('designation_poc')->nullable();
            $table->string('contact_poc')->nullable();
            $table->string('email_poc')->nullable();
            $table->string('pwhatsappgrps')->nullable();
            $table->string('wscontact_poc')->nullable();

            // Secondary Contact
            $table->string('secondary_name')->nullable();
            $table->string('secondary_designation')->nullable();
            $table->string('sdesignation')->nullable();
            $table->string('contact_spoc')->nullable();
            $table->string('spoc_email')->nullable();
            $table->string('secondarydta')->nullable();
            $table->string('wspcontact')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('member_reg');
    }
};

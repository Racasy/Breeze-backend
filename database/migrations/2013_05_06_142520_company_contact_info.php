<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('company_contact_info', function (Blueprint $table) {
            $table->id('id'); // Changed column name to 'id' for consistency
            $table->string('emailAddress');
            $table->string('phoneNumber');
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_contact_info');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('company_contact_info', function (Blueprint $table) {
            $table->id('cContactID');
            $table->unsignedBigInteger('company_id');
            $table->string('emailAddress');
            $table->string('phoneNumber');
            $table->string('address')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_contact_info');
    }
};

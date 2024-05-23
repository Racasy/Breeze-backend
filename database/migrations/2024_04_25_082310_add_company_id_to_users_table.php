<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->nullable()->after('id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });
    }*/
    //to fix code do this on startup:
            public function up()
        {
            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn('users', 'company_id')) {
                    $table->unsignedBigInteger('company_id')->nullable()->after('id');
                    $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
                }
            });
        }

        public function down()
        {
            Schema::table('users', function (Blueprint $table) {
                if (Schema::hasColumn('users', 'company_id')) {
                    $table->dropForeign(['company_id']);
                    $table->dropColumn('company_id');
                }
            });
        }

};


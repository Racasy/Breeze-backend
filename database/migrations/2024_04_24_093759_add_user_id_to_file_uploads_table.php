<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*public function up()
    {
        Schema::table('file_uploads', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('file_uploads', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }*/
    //to fix do this on startup:
    public function up()
    {
        Schema::table('file_uploads', function (Blueprint $table) {
            // Check if the column does not already exist before adding it
            if (!Schema::hasColumn('file_uploads', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
    
                // It's safe to add the foreign key constraint after confirming the column does not exist
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            }
        });
    }
    
    public function down()
    {
        Schema::table('file_uploads', function (Blueprint $table) {
            if (Schema::hasColumn('file_uploads', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
    }
};

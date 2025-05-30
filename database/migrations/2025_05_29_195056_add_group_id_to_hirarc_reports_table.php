<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('hirarc_reports', function (Blueprint $table) {
            $table->unsignedBigInteger('hirarc_group_id')->nullable()->after('id');
            $table->foreign('hirarc_group_id')->references('id')->on('hirarc_groups')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hirarc_reports', function (Blueprint $table) {
            //
        });
    }
};

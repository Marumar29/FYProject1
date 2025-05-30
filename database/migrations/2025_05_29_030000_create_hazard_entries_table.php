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
        Schema::create('hazard_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hirarc_report_id');

            // Department info (now per entry)
            $table->string('department')->nullable();
            $table->string('section')->nullable();
            $table->string('responsible_person')->nullable();
            $table->date('report_date')->nullable();
            $table->string('revision_no')->nullable();
            $table->string('activity')->nullable();


            // Hazard entry fields
            $table->string('task');
            $table->string('hazard');
            $table->string('effect_of_hazard');
            $table->integer('likelihood');
            $table->integer('severity');
            $table->integer('risk');
            $table->string('significant')->nullable();
            $table->string('control');
            $table->string('remarks')->nullable();

            $table->timestamps();

            $table->foreign('hirarc_report_id')->references('id')->on('hirarc_reports')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hazard_entries');
    }
};

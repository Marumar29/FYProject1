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
        Schema::create('hirarc_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organization_id');

            $table->string('task');
            $table->string('hazard');
            $table->string('risk');
            $table->string('likelihood');
            $table->string('severity');
            $table->string('risk_rating');
            $table->text('control_measure');

            // Prepared/Reviewed/Approved
            $table->string('prepared_by_name');
            $table->string('prepared_by_position');
            $table->date('prepared_date')->nullable();

            $table->string('reviewed_by_name');
            $table->string('reviewed_by_position');
            $table->date('reviewed_date')->nullable();

            $table->string('approved_by_name');
            $table->string('approved_by_position');
            $table->date('approved_date')->nullable();

            $table->timestamps();

            // FK
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
        });
    }

};

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

            // Prepared By Info + Signature
            $table->string('prepared_by_name');
            $table->string('prepared_by_position');
            $table->date('prepared_date');
            $table->string('signature_prepared')->nullable(); // File path to stored signature image

            // Reviewed By Info + Signature
            $table->string('reviewed_by_name');
            $table->string('reviewed_by_position');
            $table->date('reviewed_date');
            $table->string('signature_reviewed')->nullable();

            // Approved By Info + Signature
            $table->string('approved_by_name');
            $table->string('approved_by_position');
            $table->date('approved_date');
            $table->string('signature_approved')->nullable();

            // Department Details (optional: remove these if moved to entries)
            $table->string('department')->default('N/A');
            $table->string('section')->default('N/A');

            // Additional metadata (optional)
            $table->string('responsible_person')->nullable();
            $table->date('report_date')->nullable();
            $table->string('revision_no')->nullable();
            $table->string('activity')->nullable();

            // If you want to store assessment steps in JSON (optional)
            $table->json('assessment_steps')->nullable();

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('hirarc_reports');
    }
};

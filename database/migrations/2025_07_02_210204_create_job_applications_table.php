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
    Schema::create('job_applications', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('job_id'); // FK to jobs table
        $table->string('name');
        $table->string('email');
        $table->string('cv_path')->nullable(); // store CV file path
        $table->timestamps();

        // Foreign key constraint
        $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};

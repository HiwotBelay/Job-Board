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
    Schema::create('jobs', function (Blueprint $table) {
        $table->id(); // Auto-increment ID
        $table->string('title'); // Job Title
        $table->string('company'); // Company Name
        $table->string('location'); // Job Location
        $table->text('description')->nullable(); // Job Description
        $table->boolean('is_active')->default(true); // Job status
        $table->timestamps(); // created_at and updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

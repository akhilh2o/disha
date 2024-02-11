<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained('courses', 'id')->cascadeOnDelete();
            $table->boolean('payment_status')->nullable()->default(false)->comment('payment status paid/pending');
            $table->json('payment')->nullable()->default(null);
            $table->string('duration')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_courses');
    }
};

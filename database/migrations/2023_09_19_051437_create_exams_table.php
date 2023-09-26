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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses', 'id')->cascadeOnDelete();
            $table->string('name')->nullable()->default(null);
            $table->string('slug')->nullable()->default(null);
            $table->integer('duration')->nullable()->default(60)->comment('duration should be in min');
            $table->integer('passing_mark')->nullable()->default(30)->comment('attemptted student passing marks');
            $table->integer('maximum_mark')->nullable()->default(60)->comment('exam maximum marks attemptted student can score');
            $table->text('description')->nullable()->default(null);
            $table->date('start_date')->nullable()->default(null)->comment('exam start date');
            $table->date('end_date')->nullable()->default(null)->comment('exam end date');
            $table->string('status')->default('pending')->comment('pending,active,inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

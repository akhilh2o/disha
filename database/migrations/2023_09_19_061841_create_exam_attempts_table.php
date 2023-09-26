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
        Schema::create('exam_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('exam_id')->constrained('exams', 'id');
            $table->integer('score')->nullable()->default(null);
            $table->boolean('is_completed')->default(false); // Flag to indicate whether the attempt is completed
            $table->timestamp('started_at')->nullable()->default(null);
            $table->timestamp('finished_at')->nullable()->default(null);
            $table->text('notes')->nullable()->default(null); // Additional notes or comments
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_attempts');
    }
};

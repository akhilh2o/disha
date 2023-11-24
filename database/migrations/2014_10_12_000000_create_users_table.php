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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable()->default(now());
            $table->string('password');
            $table->string('mobile')->nullable()->default(null);
            $table->string('father_name')->nullable()->default(null);
            $table->string('mother_name')->nullable()->default(null);
            $table->date('dob')->nullable()->default(null);
            $table->string('gender')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
            $table->string('role')->nullable()->default('student')
                ->comment('is should be student for the student else admin');
            $table->boolean('is_insider')->nullable()->default(true);
            $table->boolean('status')->nullable()->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

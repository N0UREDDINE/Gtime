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
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->date('record_date'); // Date when the time record is created
            $table->unsignedBigInteger('user_id'); // Add a foreign key to associate with users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->time('work_time'); // 8h30min
            $table->time('login_time');
            $table->time('delay_time'); // Calculated as LoginTime - WorkTime
            $table->time('break_start_time')->nullable();
            $table->time('break_end_time')->nullable();
            $table->time('logout_time');
            $table->time('service_time'); // Chrono from 00:00:00 until he logs out
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('times');
    }
};

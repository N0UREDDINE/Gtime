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
            $table->string('work_time');
            $table->string('LogIn_time');
            $table->string('Delay_time');// LoginTime-WorkTime
            $table->string('break_start_time')->nullable();//
            $table->string('break_end_time')->nullable();
            $table->string('logout_time');
            $table->string('Full_time');//LogOut_tim-LogIn_time(-Delay -(breakEnd_time-BreakStart-time-(2h bin 12 w 2 ila kant)))
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

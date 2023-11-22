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
    Schema::create('par_jours', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // Add a foreign key to associate with users
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->unsignedBigInteger('time_id'); // Add a foreign key to associate with times
        $table->foreign('time_id')->references('id')->on('times')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('par_jours');
    }
};

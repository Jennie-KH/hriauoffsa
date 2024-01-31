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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            // $table->unsignedInteger('userId');
            // $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');

            // $table->foreignId('userId')->constrained('users')->onDelete('cascade');
          
            $table->string('userId');
            // $table->dateTime('time_in');
            // $table->dateTime('time_out');
            $table->dateTime('timeScan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};

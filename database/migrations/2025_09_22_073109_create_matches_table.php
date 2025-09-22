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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team1Id');
            $table->unsignedBigInteger('team2Id');
            $table->integer('team1score');
            $table->integer('team2score');
            $table->integer('team1points');
            $table->integer('team2points');
            $table->timestamps();

            $table->foreign('team1Id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('team2Id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};

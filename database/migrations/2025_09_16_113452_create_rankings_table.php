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
        Schema::create('rankings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teamId'); //foreign key
            $table->integer('wins');
            $table->integer('losses');
            $table->integer('draws');
            $table->integer('goal_difference');
            $table->integer('points');
            $table->timestamps();

            $table->foreign('teamId')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rankings');
    }
};

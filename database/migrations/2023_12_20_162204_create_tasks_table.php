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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('assigned_to');
            $table->string('title');
            $table->integer('max_points');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('assigned_to')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

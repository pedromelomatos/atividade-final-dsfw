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
        Schema::create('study_tracks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('area')->index();
            $table->string('level')->default('beginner')->index();
            $table->string('status')->default('planned')->index();
            $table->unsignedSmallInteger('target_hours');
            $table->unsignedSmallInteger('completed_hours')->default(0);
            $table->date('start_date')->nullable()->index();
            $table->date('due_date')->nullable()->index();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_tracks');
    }
};

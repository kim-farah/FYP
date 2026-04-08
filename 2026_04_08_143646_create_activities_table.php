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
        Schema::create('activities', function (Blueprint $table) {
        $table->id();
        $table->foreignId('template_id')->constrained('activity_templates')->cascadeOnDelete();
        $table->foreignId('chapter_id')->constrained()->cascadeOnDelete();
        $table->string('title');
        $table->text('objective')->nullable();
        $table->text('materials')->nullable();
        $table->text('instructions')->nullable();
        $table->text('teacher_notes')->nullable();
        $table->integer('estimated_duration')->nullable();
        $table->integer('order_index')->default(0);
        $table->boolean('is_active')->default(true);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};

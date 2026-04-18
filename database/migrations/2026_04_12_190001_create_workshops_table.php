<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artisan_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->date('date');
            $table->time('start_time');
            $table->decimal('duration_hours', 3, 1);
            $table->decimal('price', 8, 2);
            $table->smallInteger('max_capacity');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workshops');
    }
};
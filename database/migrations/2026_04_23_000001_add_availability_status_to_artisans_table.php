<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('artisans', function (Blueprint $table) {
            $table->string('availability_status')->default('open')->after('avg_rating');
            // 'open' = Open for commissions
            // 'busy' = Fully booked
        });
    }

    public function down(): void
    {
        Schema::table('artisans', function (Blueprint $table) {
            $table->dropColumn('availability_status');
        });
    }
};
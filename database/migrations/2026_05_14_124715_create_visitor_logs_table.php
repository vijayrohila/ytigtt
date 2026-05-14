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
        Schema::create('visitor_logs', function (Blueprint $table) {
            $table->id();
            $table->string('session_id');
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent_hash', 64)->nullable();
            $table->date('visited_on');
            $table->timestamps();

            $table->unique(['session_id', 'visited_on']);
            $table->index('visited_on');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_logs');
    }
};

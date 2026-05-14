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
        Schema::create('creator_link_unlocks', function (Blueprint $table) {
            $table->id();
            $table->date('unlock_date')->index();
            $table->string('platform', 20);
            $table->string('access_token', 64)->unique();
            $table->string('session_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->dateTime('clicked_at');
            $table->dateTime('available_at');
            $table->dateTime('expires_at');
            $table->dateTime('used_at')->nullable();
            $table->timestamps();

            $table->unique(['unlock_date', 'session_id', 'platform']);
        });

        Schema::create('creator_link_submissions', function (Blueprint $table) {
            $table->id();
            $table->date('submission_date')->index();
            $table->string('platform', 20)->index();
            $table->text('submitted_link');
            $table->string('access_token', 64)->nullable()->index();
            $table->string('session_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->dateTime('submitted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creator_link_submissions');
        Schema::dropIfExists('creator_link_unlocks');
    }
};

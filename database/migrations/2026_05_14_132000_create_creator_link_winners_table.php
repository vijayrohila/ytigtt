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
        Schema::create('creator_link_winners', function (Blueprint $table) {
            $table->id();
            $table->date('winner_date');
            $table->string('platform', 20);
            $table->foreignId('submission_id')->nullable()->constrained('creator_link_submissions')->nullOnDelete();
            $table->text('winner_link');
            $table->unsignedBigInteger('clicks')->default(0);
            $table->timestamps();

            $table->unique(['winner_date', 'platform']);
            $table->index('winner_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creator_link_winners');
    }
};

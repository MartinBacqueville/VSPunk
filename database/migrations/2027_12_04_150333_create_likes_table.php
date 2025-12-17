<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\User::class)->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignIdFor(\App\Models\Article::class)->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->enum('nature', ['like', 'dislike']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('likes', function (Blueprint $table) {
            Schema::dropIfExists('likes');
        });
    }
};

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
        Schema::create('news_and_notices', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 250)->unique();
            $table->string('title')->nullable();
            $table->enum('type', ['news', 'notice']);
            $table->timestamp('date')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_and_notice');
    }
};

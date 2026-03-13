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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->enum('type', ['code', 'video', 'article', 'book', 'course']);
            $table->text('url')->nullable();
            $table->longText('content')->nullable();
            $table->json('metadata')->nullable();
            $table->boolean('favorite')->default(false);
            $table->enum('status', ['todo', 'learning', 'done'])->default('todo');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};

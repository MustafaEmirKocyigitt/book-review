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
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('author');
            $table->timestamps();
        });
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("book_id");
            $table->text("review");
            $table->unsignedTinyInteger("rating");
            $table->foreign('book_id')->constraint()->cascadeOnDelete();
            $table->timestamps();

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
        Schema::dropIfExists('reviews');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_xxxxxx_create_articles_table.php
public function up()
{
    Schema::create('articles', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('author');
        $table->date('created_at');
        $table->string('reading_time');
        $table->string('tag');
        $table->string('image_link');
        $table->string('image_alt');
        $table->text('content');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('createdby')->foreign('createdby')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('category_id')->foreign('category_id')->references('id')->on('post_categories')->onDelete('cascade');
            $table->string('cover')->nullable();
            $table->string('keywords');
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->longText('content');
            $table->enum('publish',['publish', 'unpublish'])->default('unpublish');
            $table->timestamps();
        });
        Schema::create('post_tag_relationships', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('post_tag_id');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('post_tag_id')->references('id')->on('post_tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_tag_relationships');
    }
};

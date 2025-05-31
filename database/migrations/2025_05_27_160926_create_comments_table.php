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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id');  // FK to blogs
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            
            $table->string('website')->nullable();
            $table->string('ip_address')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->unsignedBigInteger('parent_id')->nullable(); // for nested comments
            $table->integer('likes')->default(0);

            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
             $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

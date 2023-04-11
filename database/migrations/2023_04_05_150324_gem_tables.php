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
      Schema::dropIfExists("users");
      Schema::dropIfExists("books");
      Schema::dropIfExists("borrows");
      
      Schema::create('users', function(Blueprint $table){
        $table->uuid('id')->primary();
        $table->string('name');
        $table->string('email')->unique();
        $table->text('password');
        $table->string('role');
        $table->text('address')->nullable(); 
        $table->double('phone')->nullable();
        $table->timestamps();
      });

      Schema::create('books', function(Blueprint $table){
        $table->uuid('id')->primary();
        $table->text('title');
        $table->string('author');
        $table->text('desc');
        $table->text('publisher');
        $table->integer("qtPages");
        $table->dateTime('releaseDt');
        $table->string('category');
        $table->text('imgUrl')->nullable();
        $table->integer('available');
        $table->integer('qt');
        $table->timestamps();

      });

      Schema::create('borrows', function(Blueprint $table){
        $table->dropForeign('userId');
        $table->dropForeign('bookId');

        $table->uuid('id')->primary();
        $table->timestamp('borrowedDt');
        $table->timestamp('returnDt');
        $table->boolean('returned');
        $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        $table->foreignUuid('book_id')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('users');  
      Schema::dropIfExists('books');  
      Schema::dropIfExists('borrows');  
    }
};

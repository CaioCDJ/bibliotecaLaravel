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
      Schema::create('Users', function(Blueprint $table){
        $table->uuid('id')->primary();
        $table->string('name');
        $table->string('email');
        $table->text('password');
        $table->string('role');
        $table->text('address')->nullable(); 
        $table->double('phone')->nullable();
        $table->timestamps();
      });

      Schema::create('Books', function(Blueprint $table){
        
        $table->uuid('id')->primary();
        $table->string('title');
        $table->string('author');
        $table->text('desc');
        $table->text('publisher');
        $table->dateTime('releaseDt');
        $table->string('category');
        $table->text('imgUrl')->nullable();
        $table->integer('released');
        $table->integer('available');
        $table->integer('qt');

      });

      Schema::create('Borrows', function(Blueprint $table){
        $table->uuid('id')->primary();
        $table->timestamp('borrowedDt');
        $table->timestamp('returnDt');
        $table->boolean('returned');
        $table->foreignUuid('userId')->references('id')->on('users');
        $table->foreignUuid('bookId')->references('id')->on('books');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('users');  
      Schema::dropIfExists('admins');  
      Schema::dropIfExists('books');  
      Schema::dropIfExists('borrows');  
    }
};

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
      Schema::create('Admins', function(Blueprint $table){
        $table->uuid('id')->primary();
        $table->text("name");
        $table->text("email");
        $table->text('password');
        $table->timestamps();
      });

      Schema::create('Clients', function(Blueprint $table){
        $table->uuid('id')->primary();
        $table->text('name');
        $table->text('email');
        $table->text('password');
        $table->text('address'); 
        $table->integer('phone');
        $table->timestamps();
      });

      Schema::create('Books', function(Blueprint $table){
        
        $table->uuid()->primary();
        $table->text('title');
        $table->text('author');
        $table->text('desc');
        $table->text('publisher');
        $table->integer('released');
        $table->integer('available');
        $table->integer('qt');

      });

      Schema::create('Borrows', function(Blueprint $table){
        $table->uuid('id')->primary();
        $table->timestamp('borrowedDt');
        $table->timestamp('returnDt');
        $table->uuid('userId');
        $table->uuid('bookId');
      });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('Clients');  
      Schema::dropIfExists('Admins');  
      Schema::dropIfExists('Books');  
      Schema::dropIfExists('Borrows');  
    }
};

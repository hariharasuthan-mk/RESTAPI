<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');            
           
            $table->string('subtitle', 50);            
           
            $table->string('content');
           

            $table->bigInteger('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users')->comment('Comment owner from user table reference');

            $table->bigInteger('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts')->comment('post reference');


            $table->enum('active', ['yes', 'no'])->default('yes');
            
            $table->timestamps();

            $table->unique(['subtitle', 'content', 'author_id', 'post_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}

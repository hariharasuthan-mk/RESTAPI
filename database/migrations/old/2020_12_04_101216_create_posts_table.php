<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('title', 100);
            $table->string('subtitle', 50);
            $table->string('content');

            $table->bigInteger('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users')->comment('post owner from user table reference');

            $table->timestamp('published_at');       

            $table->enum('active', ['yes', 'no'])->default('yes');
            $table->timestamps();

            $table->index(['title','subtitle', 'content']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

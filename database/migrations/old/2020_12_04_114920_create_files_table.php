<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            
           
            $table->string('subtitle', 50);
            $table->string('content');

            $table->bigInteger('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users')->comment('Comment owner from user table reference');

            $table->enum('active', ['yes', 'no'])->default('yes');
            $table->timestamps();

            $table->index(['subtitle', 'content']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}

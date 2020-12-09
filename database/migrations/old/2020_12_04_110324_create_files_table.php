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

            $table->string('name')->nullable();
            $table->string('file_path')->nullable();

            $table->bigInteger('author_by')->unsigned();
            $table->foreign('author_by')->references('id')->on('users');
                 
            $table->enum('type', ['post',
                'user', 'comment'])->default('user');


                        

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

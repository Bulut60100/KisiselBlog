<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('categoryid');
            $table->string('title');
            $table->string('image');
            $table->string('content');
            $table->integer('status')->default(0);
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('categoryid')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

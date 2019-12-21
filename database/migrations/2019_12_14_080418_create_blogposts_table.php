<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateBlogpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogposts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('author')->nullable();
            $table->string('title');
            $table->string('heading');
            $table->string('short_content');
            $table->text('long_content1');
            $table->text('lomg_content2')->nullable();
            $table->text('thumbnail1')->nullable();
            $table->text('thumbnail2')->nullable();
            $table->text('video1')->nullable();
            $table->text('video2')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogposts');
    }
}

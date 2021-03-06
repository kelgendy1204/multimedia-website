<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->increments('id');
            $table->string('title');
            $table->string('photo_url')->nullable();
            $table->string('description');
            $table->longText('download_page')->nullable();
            $table->text('key_words')->nullable();
            $table->integer('alt_link')->nullable();
            $table->longText('long_description')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('visible')->default(false);
            $table->boolean('pinned')->default(false);
            $table->integer('visits')->default(0);
            $table->integer('position')->default(0);
            $table->integer('category_id')->default(0);
            $table->integer('user_id');

            $table->timestamps();
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

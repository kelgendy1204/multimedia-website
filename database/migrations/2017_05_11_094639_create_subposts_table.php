<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subposts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('visible');
            $table->integer('post_id');
            $table->timestamps();
            // $table->unique(['post_id', 'title']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subposts');
    }
}

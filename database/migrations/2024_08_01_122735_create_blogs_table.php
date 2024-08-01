<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title', '60');
            $table->string('subtitle', '120');
            $table->string('slug', '60');
            $table->text('content');

            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users');

            $table->dateTime('published_at');

            $table->integer('sequence');
            $table->enum('status', ['published', 'pending']);

            $table->string('featured_image', '255');

            $table->string('tags', '255')->nullable();
            $table->string('meta_description', '160');

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
        Schema::dropIfExists('blogs');
    }
}

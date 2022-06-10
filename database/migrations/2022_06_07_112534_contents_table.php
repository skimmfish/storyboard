<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_content', function (Blueprint $table) {
            $table->id();
            $table->string('post_title')->unique()->index();
            $table->string('post_bg_img')->index()->nullable();
            $table->text('post_body')->nullable();
            $table->string('tags')->index();
            $table->boolean('publish_status')->index();
            $table->text('description');
            $table->string('category')->index()->nullable();
            $table->integer('ads_selected')->unsigned();
            $table->foreign('ads_selected')->references('id')->on('ads_manager')->onDelete('cascade');
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users');
            $table->index('ads_selected','ads_code_id');
            
            $table->softDeletes();
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
        Schema::dropIfExists('post_content');

    }
};

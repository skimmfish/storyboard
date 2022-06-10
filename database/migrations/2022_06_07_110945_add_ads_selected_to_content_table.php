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
        Schema::table('contents', function (Blueprint $table) {
            $table->integer('ads_selected')->unsigned()->unique();
            $table->foreign('ads_Selected')->references('id')->on('ads_manager')->onDelete('cascade');
            $table->index('ads_selected','ads_code_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->dropColumn('ads_selected');
            $table->dropForeign('ads_code_id');
        });
    }
};

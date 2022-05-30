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
        Schema::table('claps', function (Blueprint $table) {
            $table->integer('post_id')->after('clap_count')->unsigned()->unique();
            //creating a foreign key for claps since we only need to update the clap count
            $table->foreign('post_id')->references('id')->on('contents')->onDelete('cascade');
            $table->index('post_id','post_id_fk');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('claps', function (Blueprint $table) {
            $table->dropColumn('post_id');
            $table->dropForeigh('post_id_fk');
        });
    }
};

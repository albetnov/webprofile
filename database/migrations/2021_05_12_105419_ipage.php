<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ipage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipage', function (Blueprint $table){
            $table->id();
            $table->string('img_c1');
            $table->string('img_c2');
            $table->string('img_c3');
            $table->string('title_c1');
            $table->string('title_c2');
            $table->string('title_c3');
            $table->string('desc_c1');
            $table->string('desc_c2');
            $table->string('desc_c3');
            $table->string('img_welcome');
            $table->string('title_welcome');
            $table->longText('desc_welcome');
            $table->string('video_background');
            $table->string('yt_id');
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

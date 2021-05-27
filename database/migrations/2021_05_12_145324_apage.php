<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Apage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apage', function (Blueprint $table) {
            $table->id();
            $table->string('about_img');
            $table->integer('work_exp', false, true);
            $table->string('about_title');
            $table->longText('about_p1');
            $table->longText('about_p2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apage');
    }
}

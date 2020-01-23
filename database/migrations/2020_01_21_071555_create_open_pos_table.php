<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpenPosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_pos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_open');
            $table->string('hour_open');
            $table->integer('value_previous_close')->nullable();
            $table->integer('value_open');
            $table->string('observation')->nullable();
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
        Schema::dropIfExists('open_pos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClosePosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('close_pos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_close');
            $table->string('hour_close');
            $table->integer('value_card');
            $table->integer('value_cash');
            $table->integer('value_close');
            $table->integer('value_open');
            $table->integer('value_sales');
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
        Schema::dropIfExists('close_pos');
    }
}

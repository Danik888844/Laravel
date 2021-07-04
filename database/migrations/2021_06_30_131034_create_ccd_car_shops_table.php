<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCcdCarShopsTable extends Migration
{
    public function up()
    {
        Schema::create('ccd_car_shops', function (Blueprint $table) {
            $table->id();
            $table->string('carName')->unique();
            $table->string('price');
            $table->string('tax');
            $table->integer('maxSpeed');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ccd_car_shops');
    }
}

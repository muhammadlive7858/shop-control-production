<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSotuvRoyxatisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sotuv__royxatis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('product_name');
            $table->integer('count');
            $table->string('foyda');
            $table->string('skidka');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sotuv__royxatis');
    }
}

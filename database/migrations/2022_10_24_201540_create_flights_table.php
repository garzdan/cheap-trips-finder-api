<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('code_departure', 3);
            $table->string('code_arrival', 3);
            $table->integer('price');

            $table->foreign('code_departure')
                ->references('code')
                ->on('airports')
                ->onDelete('cascade');

            $table->foreign('code_arrival')
                ->references('code')
                ->on('airports')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}

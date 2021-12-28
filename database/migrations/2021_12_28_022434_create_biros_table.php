<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('wisatawan_id')->unsigned();
            $table->string('nama');
            $table->string('alamat');
            $table->bigInteger('telpon');
            //fk wisatawan
            $table->foreign('wisatawan_id')->references('id')
                ->on('wisatawans')->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('biros');
    }
}

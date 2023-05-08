<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCausasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('causas', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('derecho_id');
            $table->char('codigo',5);
            $table->string('nombre')->unique();
            $table->text('definicion');
            $table->text('defini');
				$table->foreign('derecho_id')->references('id')->on('derechos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('causas');
    }
}

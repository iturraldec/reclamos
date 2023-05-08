<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamos', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('tipo_id')->nullable();
            $table->unsignedSmallInteger('causa_id')->nullable();
            $table->unsignedSmallInteger('origen_id')->nullable();
            $table->unsignedSmallInteger('estado_id')->default(4);
            $table->date('fecha_evento')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('user2_id')->nullable(); //quien presenta
            $table->string('codigo_historia', 50)->nullable();
            $table->text('descripcion');
            $table->string('evidencia')->nullable();
            $table->text('analisis')->nullable();
            $table->text('conclusion')->nullable();
            $table->smallInteger('dias_max_resp')->default(30);
            $table->timestamps();
            $table->foreign('tipo_id')->references('id')->on('tipos')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('causa_id')->references('id')->on('causas')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('origen_id')->references('id')->on('origenes')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('estado_id')->references('id')->on('estados')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('user2_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reclamos');
    }
}

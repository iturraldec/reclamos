<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('rol', ['Admin', 'Guest']);
            $table->enum('dip_tp', ['DNI', 'RUC', 'PASAPORTE', 'CARNET DE EXTRANJERO']);
            $table->string('dip', 20);
            $table->string('password'); // si es invitado su clave sera su # de identificacion
            $table->string('name');
            $table->string('domicilio');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telefono')->nullable();
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
        Schema::dropIfExists('users');
    }
}

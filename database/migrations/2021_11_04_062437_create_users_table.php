<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Запускает миграции
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Lastname');
            $table->string('Firstname');
            $table->string('Secondname');
            $table->char('Debt', 11);
            $table->char('StateFee', 11);
        });
    }

    /**
     * Переворачивает миграции
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

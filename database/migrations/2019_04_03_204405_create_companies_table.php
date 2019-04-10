<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191)->nullable();
            $table->string('email', 191)->unique();
            $table->string('trade', 191)->nullable();
            $table->string('phone', 191)->nullable();
            $table->longtext('description', 191)->nullable();
            $table->string('cnpj', 191)->nullable();
            $table->string('occupation_area', 191)->nullable();
            $table->string('cep', 191)->nullable();
            $table->string('number', 191)->nullable();
            $table->string('linkedin', 191)->nullable();
            $table->string('facebook', 191)->nullable();
            $table->string('twitter', 191)->nullable();
            $table->string('blog', 191)->nullable();
            $table->string('password', 191);
            $table->rememberToken();
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
        Schema::drop('companies');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->string('cep', 191)->nullable();
            $table->string('email', 191)->unique();
            $table->string('occupation',191)->nullable();
            $table->string('cpf', 191)->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('number')->nullable();
            $table->string('nehighbor')->nullable();
            $table->string('street')->nullable();
            $table->string('phone', 191)->nullable();
            $table->date('birthdate', 191)->nullable();
            $table->string('marital_status', 191)->nullable();
            $table->char('sex', 2)->nullable();
            $table->boolean('special')->nullable();
            $table->longText('special_description')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('blog')->nullable();
            $table->boolean('travel')->nullable();
            $table->string('complement')->nullable();
            $table->boolean('change')->nullable();
            $table->integer('journey_id')->nullable();
            $table->integer('contract_type_id')->nullable();
            $table->integer('max_hierarchy_id')->nullable();
            $table->integer('min_hierarchy_id')->nullable();
            $table->double('salary')->nullable();
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
        Schema::drop('candidates');
    }
}

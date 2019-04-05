<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateFormationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_formation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');        
            $table->integer('country_id');
            $table->integer('state_id');
            $table->string('level');
            $table->integer('course');
            $table->string('situation');
            $table->string('start');
            $table->string('finish');
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
        Schema::dropIfExists('candidate_formation');
    }
}

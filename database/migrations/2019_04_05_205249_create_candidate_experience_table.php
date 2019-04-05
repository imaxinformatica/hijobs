<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_experience', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('hierarchy_id');
            $table->longText('description');
            $table->integer('country_id');
            $table->integer('state_id');
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
        Schema::dropIfExists('candidate_experience');
    }
}

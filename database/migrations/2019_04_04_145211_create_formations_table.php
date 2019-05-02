<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->integer('country_id');
            $table->integer('state_id')->nullable();
            $table->string('level_id');
            $table->integer('course_id');
            $table->string('situation');
            $table->string('start_month');
            $table->string('start_year');
            $table->string('finish_month')->nullable();
            $table->string('finish_year')->nullable();
            $table->integer('candidate_id');
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
        Schema::dropIfExists('formations');
    }
}

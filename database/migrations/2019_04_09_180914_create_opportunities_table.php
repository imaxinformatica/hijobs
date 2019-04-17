<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longtext('activity')->nullable();
            $table->longtext('requiriments')->nullable();
            $table->longtext('comments_special')->nullable();
            $table->string('time')->nullable();
            $table->longtext('additionally')->nullable();
            $table->double('salary')->nullable();
            $table->integer('num')->nullable();
            $table->integer('contract_type_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('special')->nullable();
            $table->integer('company_id');
            $table->boolean('publish')->nullable();
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
        Schema::dropIfExists('opportunities');
    }
}

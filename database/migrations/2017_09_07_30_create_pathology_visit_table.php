<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePathologyVisitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pathology_visit', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pathology_id')->unsigned();
            $table->integer('visit_id')->unsigned();

            $table->foreign('pathology_id')->references('id')->on('pathologies')->onDelete('cascade');            
            $table->foreign('visit_id')->references('id')->on('visits')->onDelete('cascade');

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
        Schema::dropIfExists('pathology_visit');
    }
}

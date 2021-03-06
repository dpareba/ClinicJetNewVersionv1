<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->increments('id');
 
            $table->string('medicinename');
            $table->string('medicinecomposition');
            $table->string('doseduration');
            $table->string('dosetimings');
            $table->string('doseregime');
            $table->string('remarks');

            $table->integer('visit_id')->unsigned();
            $table->integer('medicine_id')->unsigned();

            $table->foreign('visit_id')->references('id')->on('visits');
            $table->foreign('medicine_id')->references('id')->on('medicines');

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
        Schema::dropIfExists('prescriptions');
    }
}

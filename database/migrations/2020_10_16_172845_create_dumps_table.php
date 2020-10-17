<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDumpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dumps', function (Blueprint $table) {
            $table->id();
            $table->string('HazardousMaterialCode')->nullable();
            $table->string('PartNumber')->nullable();
            $table->string('BrandAAIAID')->nullable();
            $table->string('BrandLabel')->nullable();
            $table->string('PartTerminologyID')->nullable();
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
        Schema::dropIfExists('dumps');
    }
}

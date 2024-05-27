<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('component');
            $table->string('registration_name');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('type');
            $table->string('location')->nullable();
            $table->string('description')->nullable();
            $table->integer('cohort_number');
            $table->string('status');
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
        Schema::dropIfExists('component_registrations');
    }
}

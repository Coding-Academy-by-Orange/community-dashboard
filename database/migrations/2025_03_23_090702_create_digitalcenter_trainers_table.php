<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigitalcenterTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_d_c_trainers', function (Blueprint $table) {
            $table->id();
            $table->string('trainer_name');
            $table->string('organization');
            $table->string('digital_center');
            $table->string('governorate');
            $table->json('courses')->nullable();
            $table->json('career_months')->nullable();
            $table->integer('career_days')->nullable();
            $table->json('career_topics')->nullable();
            $table->json('soft_months')->nullable();
            $table->integer('soft_days')->nullable();
            $table->json('topics')->nullable();
            $table->json('digital_topics')->nullable();
            $table->json('entre_months')->nullable();
            $table->integer('entre_days')->nullable();
            $table->json('entre_topics')->nullable();
            $table->text('other')->nullable();
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
        Schema::dropIfExists('digitalcenter_trainers');
    }
}

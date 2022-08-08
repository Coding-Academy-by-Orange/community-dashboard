<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //basic information
            $table->id();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string("is_newsletter")->nullable();
            $table->string('provider_id')->nullable();
            $table->string('email_verification')->nullable();
            $table->boolean('is_email_verified')->default(0);
            $table->string('mobile')->nullable();
            $table->string('mobile_verification')->nullable();
            $table->boolean('is_mobile_verified')->default(0);
            $table->boolean('nationality')->nullable();
            $table->text('country')->nullable();
            $table->bigInteger('identity_number')->nullable();
            $table->bigInteger('residency_number')->nullable();
            $table->bigInteger('year')->nullable();
            $table->string('month')->nullable();
            $table->bigInteger('day')->nullable();
            $table->string('en_first_name')->nullable();
            $table->string('en_second_name')->nullable();
            $table->string('en_third_name')->nullable();
            $table->string('en_last_name')->nullable();
            $table->string('ar_first_name')->nullable();
            $table->string('ar_second_name')->nullable();
            $table->string('ar_third_name')->nullable();
            $table->string('ar_last_name')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('martial_status')->nullable();
            $table->rememberToken()->nullable();

            // basic info
            $table->string('educational_level')->nullable();
            $table->string('educational_status')->nullable();
            $table->string('field')->nullable();
            $table->string('educational_background')->nullable();
            $table->string('ar_writing')->nullable();
            $table->string('ar_speaking')->nullable();
            $table->string('en_writing')->nullable();
            $table->string('en_speaking')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('relative_mobile_1')->nullable();
            $table->string('relative_relation_1')->nullable();
            $table->string('fullName_1')->nullable();
            $table->bigInteger('relative_mobile_2')->nullable();
            $table->string('relative_relation_2')->nullable();
             $table->string('fullName_2')->nullable();
            $table->string('is_committed')->nullable();

            //is submitted
            $table->boolean('is_submitted')->default(0);
            $table->string('status')->default('in_progress');
            $table->string('result_1')->nullable();

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
        Schema::dropIfExists('users');
    }
}

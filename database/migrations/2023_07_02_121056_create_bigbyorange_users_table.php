<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBigbyorangeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigbyorange_users', function (Blueprint $table) {
            $table->id();

            // Step 1
            $table->string('evaluation_purposes');


            //Step 2
            $table->string('first_name');
            $table->string('father_name');
            $table->string('grandfather_name');
            $table->string('last_name');
            $table->string('linkedin_profile');
            $table->string('nationality');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('passport_number')->unique()->nullable();
            $table->bigInteger('national_id')->unique()->nullable();
            $table->date('birthday');
            $table->bigInteger('mobile')->unique();
            $table->string('residence');
            $table->string('education');
            $table->string('major_study')->default('without_major')->nullable();
            $table->string('employment');
            $table->string('person_with_disability');
            $table->integer('Male_Co_Founders');
            $table->integer('Female_Co_Founders');
            $table->string('Position');
            $table->text('ProvideOfPosition');


            // Step 3
            $table->string('Startup');
            $table->string('Startup_Name');
            $table->string('Website');
            $table->string('Social_Media');
            $table->text('problem_your_startup');
            $table->text('describe_your_solution');
            $table->string('MVP_Demo');
            $table->string('startup_registered');
            $table->string('registration_number');
            $table->text('startup_serve');
            $table->string('Funds');
            $table->text('source_funds');
            $table->string('amount_of_funds');
            $table->string('new_funds');
            $table->text('markets');
            $table->string('revenue');
            $table->text('milestones_and_achievements');


            // Step 4
            $table->text('describe_the_effect');
            $table->text('business_opportunities');
            $table->string('specify_units');
            $table->text('expectations');
            $table->string('consent_to_receiving');


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
        Schema::dropIfExists('bigbyorange_users');
    }
}

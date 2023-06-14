<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFablabUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fablab_users', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('father_name');
            $table->string('grandfather_name');
            $table->string('last_name');

            $table->string('nationality');
            $table->string('affiliation');
            $table->string('gender');
            $table->string('email')->unique();

            $table->string('passport_number')->unique()->nullable();
            $table->bigInteger('national_id')->unique()->nullable();
            $table->integer('age');
            $table->bigInteger('mobile')->unique();
            $table->bigInteger('whatsaap')->unique();

            $table->string('residence');
            $table->string('education');
            $table->string('major_study')->default('without_major')->nullable();
            $table->string('employment');

            $table->string('program');
            $table->string('technology_type');
            $table->string('idea_description');

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
        Schema::dropIfExists('fablab_users');
    }
}

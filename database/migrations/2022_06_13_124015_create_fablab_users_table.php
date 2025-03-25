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
            $table->date('birthdate');
            $table->string('mobile')->unique();
            $table->string('whatsapp')->unique()->nullable();

            $table->string('residence');
            $table->string('education');
            $table->string('major_study')->default('without_major')->nullable();
            $table->string('employment');

            $table->string('program');
            $table->text('idea_description');
            $table->string('project_stage')->nullable(); 
            $table->integer('team_size')->nullable();

            $table->string('status')->default('pending');

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

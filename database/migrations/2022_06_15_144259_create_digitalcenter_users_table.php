<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigitalcenterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digitalcenter_users', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('father_name');
            $table->string('grandfather_name');
            $table->string('last_name');

            $table->string('nationality');
            $table->string('gender');
            $table->string('email')->unique();

            $table->string('passport_number')->unique()->nullable();
            $table->string('other_nationalty')->nullable();
            $table->bigInteger('national_id')->unique()->nullable();
            $table->date('birthdate');
            $table->string('mobile')->unique();
            $table->string('whatsapp')->nullable();

            $table->string('residence');
            $table->string('education');
            $table->string('employment');
            $table->string('center');

            $table->string('obstacles');
            $table->string('type_of_obstacles')->nullable();

            $table->string('programming');
            $table->string('news')->nullable();
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
        Schema::dropIfExists('digitalcenter_users');
    }
}

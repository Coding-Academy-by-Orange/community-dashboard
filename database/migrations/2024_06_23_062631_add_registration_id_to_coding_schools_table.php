<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegistrationIdToCodingSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coding_schools', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('registration_id')->nullable();
            $table->foreign('registration_id')->references('id')->on('component_registrations')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coding_schools', function (Blueprint $table) {
            //
        });
    }
}

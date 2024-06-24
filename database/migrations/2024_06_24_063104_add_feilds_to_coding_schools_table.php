<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeildsToCodingSchoolsTable extends Migration
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
            $table->string('governorate')->nullable()->after('nationality');
            $table->string('other_major')->nullable()->after('major_study');
            $table->string('university')->nullable()->after('major_study');
            $table->string('academic_year')->nullable()->after('major_study');
            $table->string('employment_status')->nullable()->after('major_study');
            $table->longText('technologies')->nullable()->after('employment_status');
            $table->longText('other_technologies')->nullable()->after('technologies');
        $table->longText('reason_to_join')->nullable()->after('other_technologies');
        $table->string('availability')->nullable()->after('reason_to_join');
        $table->string('affordability')->nullable()->after('availability');
        $table->string('program')->nullable()->after('affordability');
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

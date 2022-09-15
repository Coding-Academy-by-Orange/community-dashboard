<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodeChallangesToCodeChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('code_challenges', function (Blueprint $table) {
            //
            $table->string('code_account_link_python')->nullable();
            $table->string('code_score_image_python')->nullable();
            $table->string('code_score_image_math')->nullable();
            $table->string('code_score_image_iq')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('code_challenges', function (Blueprint $table) {
            //
            $table->dropColumn(array('code_account_link_python','code_score_image_python','code_score_image_iq'));
        });
    }
}

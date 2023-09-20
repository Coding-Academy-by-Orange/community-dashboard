<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_registers', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('father_name')->nullable();
            $table->string('grandfather_name')->nullable();
            $table->string('last_name');

            $table->string('nationality')->nullable();
            $table->string('gender');
            $table->string('email');

            $table->string('passport_number')->unique()->nullable();
            $table->bigInteger('national_id')->unique()->nullable();
            
            $table->date('birthdate')->nullable();
            $table->bigInteger('mobile')->unique();

            $table->string('residence');
            $table->string('education')->nullable();
            $table->string('employment')->nullable();

            $table->string('component')->nullable();
            $table->foreignId('admin_id')->nullable()->constrained('admins')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('activity_id')->references('id')->on('activity'); 

            $table->foreignId('activity_id')->constrained('activities')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('activity_registers');
    }
}

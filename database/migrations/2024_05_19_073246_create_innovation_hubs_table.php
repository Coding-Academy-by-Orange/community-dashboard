<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInnovationHubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('innovation_hubs', function (Blueprint $table) {
            $table->id();
            // Common Fields for Book Tour, Workshop, and Program
            $table->string('name'); // Your Name
            $table->string('email'); // Your Email
            $table->string('mobile'); // Mobile No.
            $table->enum('gender', ['male', 'female']); // Gender

            // Book Tour Specific Fields
            $table->integer('age')->nullable(); // Your Age
            $table->string('background')->nullable(); // Your Background
            $table->text('interest')->nullable(); // Why you would like to join
            $table->enum('disability', ['yes', 'what', 'no', 'na'])->nullable(); // Disability

            // Program Specific Fields
            $table->enum('program', ['hackathon', 'bootcamp', 'problemSolving', 'idea', 'innovatorResidence', 'bookVenue'])->nullable(); // Program Type
            $table->date('tour_date')->nullable(); // Desired date of the tour or workshop
            $table->enum('entity_type', ['company', 'startup', 'university', 'individual'])->nullable(); // Who are you
            $table->string('entity_name')->nullable(); // Entity's Name

            // Workshop Specific Fields
            $table->string('workshop_date')->nullable(); // Desired date of the Workshop
            $table->string('attached_document')->nullable(); // Attached Document

            // Common Message Field
            $table->text('message')->nullable(); // Message Field for additional info
            $table->string('topic')->nullable();
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
        Schema::dropIfExists('innovation_hubs');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiberAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('fiber_academies', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->enum('age', ['18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30']);
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('education', [
                                 'tawjihi',
                                 'Diploma (Non-Engineering Specializations)',
                                 'Diploma (Engineering Specializations)',
                                 'Bachelor (Non-Engineering Specializations)',
                                 'Bachelor (Engineering Specializations)',
                                 'Master',
                                 'PhD'
                        ]);
            $table->string('specialization');
            $table->boolean('experience_in_marketing')->default(false);
            $table->string('phone_number')->unique();
            $table->string('residence');
            $table->enum('join_motivation', [
                'I want to learn and develop my skills because this field is my passion',
                'I think it might be useful for me in the future, but Im not sure',
                'I registered based on a friends advice, but I dont know much about the program',
                'I dont have a clear reason, but I want to try',
            ]);
            $table->enum('challenge_handling', [
                'I look for solutions and challenge myself to continue until I overcome the problem',
                'I try for a while, but if its too difficult, I might consider stopping',
                'I prefer to avoid challenges and look for easier ways to complete tasks',
                'I ask for help directly without trying to find the solution myself',
            ]);
            $table->enum('program_benefit', [
                'I have a clear vision of how to apply what I will learn in my professional or personal life',
                'I think I might benefit from it, but I havent made a clear plan yet',
                'I dont know how I will use this knowledge in the future, but I might find it useful later',
                'I dont think I will use it later, but I enjoyed the experience',
            ]);
            $table->enum('commitment_question', [
                'I will set an organized schedule and stick to it because I see great value in this program',
                'I will try to balance tasks, but I might miss some sessions',
                'If my commitments increase, I might leave the program',
                'I dont know, I will try but without guarantees',
            ]);
            $table->boolean('take_similar_courses')->default(false);
            $table->string('courses_you_take')->nullable();
            $table->boolean('have_disability')->default(false);
            $table->enum('disability_type', ['mobility', 'visual', 'hearing'])->nullable();
            $table->enum('status',['accepted', 'rejected', 'pending'])->default('pending');
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
        Schema::dropIfExists('fiber_academies');
    }
}

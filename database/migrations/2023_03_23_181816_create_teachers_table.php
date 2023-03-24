<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_name');
            $table->string('teacher_designetion');
            $table->string('accademic_profile');
            $table->string('biography');
            $table->string('research_areas');
            $table->string('teaching_subject');
            $table->string('teacher_image');
            $table->string('teacher_phone');
            $table->string('teacher_email');
            $table->string('teacher_facebook')->nullable();
            $table->string('teacher_youtube')->nullable();
            $table->string('teacher_linkedin')->nullable();
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
        Schema::dropIfExists('teachers');
    }
};
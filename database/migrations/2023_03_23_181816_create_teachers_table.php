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
            $table->longText('accademic_profile');
            $table->longText('biography');
            $table->longText('research_areas');
            $table->longText('teaching_subject');
            $table->longText('teacher_image');
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
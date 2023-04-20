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
        Schema::create('semester_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('routine_semester_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->string('Semester');
            $table->string('Subject_Name');
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
        Schema::dropIfExists('semester_subjects');
    }
};
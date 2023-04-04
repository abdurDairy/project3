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
        Schema::create('routine_semester_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('routine_semester_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('section')->nullable();
            $table->longText('routine_details');
            $table->string('routine_img')->nullable();
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
        Schema::dropIfExists('routine_semester_details');
    }
};
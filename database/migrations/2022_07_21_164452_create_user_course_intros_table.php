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
        Schema::create('user_course_intros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_intro_id')->constrained('course_intros')->cascadeOnDelete();
            $table->enum('status',['in_process', 'finished', 'declined'])->default('in_process');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_course_intros');
    }
};

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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('title')->constrained('translates')->cascadeOnDelete();
            $table->foreignId('description')->nullable()->constrained('translates')->cascadeOnDelete();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->string('block');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footers');
    }
};

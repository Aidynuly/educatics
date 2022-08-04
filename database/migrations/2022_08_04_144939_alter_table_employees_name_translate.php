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
        Schema::table('employees',function (Blueprint $table) {
            $table->foreignId('name')->nullable()->after('image')->constrained('translates')->cascadeOnDelete();
            $table->foreignId('surname')->nullable()->after('name')->constrained('translates')->cascadeOnDelete();
            $table->foreignId('position')->nullable()->after('surname')->constrained('translates')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};

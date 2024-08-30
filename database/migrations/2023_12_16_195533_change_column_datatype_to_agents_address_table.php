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
        Schema::table('agents_address', function (Blueprint $table) {
            $table->unsignedBigInteger('birth_city')->nullable()->change();
            $table->unsignedBigInteger('h_city')->nullable()->change();
            $table->unsignedBigInteger('h_state')->nullable()->change();
            $table->unsignedBigInteger('b_state')->nullable()->change();
            $table->unsignedBigInteger('b_city')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agents_address', function (Blueprint $table) {
            $table->string('birth_city')->nullable()->change();
            $table->string('h_city')->nullable()->change();
            $table->string('h_state')->nullable()->change();
            $table->string('b_state')->nullable()->change();
            $table->string('b_city')->nullable()->change();
        });
    }
};

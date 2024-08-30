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
        Schema::create('agents_address', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('telephone', 191)->nullable();
            $table->string('birth_city')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('h_country')->nullable();
            $table->string('h_state')->nullable();
            $table->string('h_city')->nullable();
            $table->string('h_location')->nullable();
            $table->string('h_detail_address')->nullable();
            $table->string('b_country')->nullable();
            $table->string('b_state')->nullable();
            $table->string('b_city')->nullable();
            $table->string('b_location')->nullable();
            $table->string('b_detail_address')->nullable();
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
        Schema::dropIfExists('agents_address');
    }
};

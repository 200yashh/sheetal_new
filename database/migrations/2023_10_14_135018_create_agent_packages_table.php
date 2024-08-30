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
        Schema::create('agent_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('days');
            $table->string('availability')->nullable();
            $table->string('flight')->nullable();
            $table->string('rate')->nullable();
            $table->string('event')->nullable();
            $table->string('discount')->nullable();
            $table->string('makkah_hotel')->nullable();
            $table->string('medina_hotel')->nullable();
            $table->string('makkah_hotel_distance')->nullable();
            $table->string('medina_hotel_distance')->nullable();
            $table->unsignedBigInteger('master_package_id')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('agent_packages');
    }
};

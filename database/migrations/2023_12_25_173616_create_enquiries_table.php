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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_enquiry_id')->index('master_enquiry_id');
            $table->string('name_as_per_passport', 255)->nullable();
            $table->string('passport_number', 50)->nullable();
            $table->date('passport_date_of_issue')->nullable();
            $table->date('passport_date_of_expiry')->nullable();
            $table->string('nationality')->nullable();
            $table->date('dob')->nullable();
            $table->text('place_of_birth')->nullable();
            $table->string('gender', 50)->nullable();
            $table->text('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('enquiries');
    }
};

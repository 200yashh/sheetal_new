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
        Schema::create('agents_other_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('office_photo')->nullable();
            $table->string('aadhaar_no', 50)->nullable();
            $table->string('pan_no', 50)->nullable();
            $table->string('voter_id_no', 50)->nullable();
            $table->string('passport_no', 50)->nullable();
            $table->date('passport_issue_date')->nullable();
            $table->date('passport_expiry_date')->nullable();
            $table->string('passport_place_of_issue', 191)->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_number', 50)->nullable();
            $table->string('ifsc_code', 50)->nullable();
            $table->string('shop_act_license_no')->nullable();
            $table->string('iata_license_no')->nullable();
            $table->text('hint_questions')->nullable();
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
        Schema::dropIfExists('agents_other_details');
    }
};

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
        Schema::table('countries', function (Blueprint $table) {
            $table->boolean('status')->default(1)->after('name');
        });
        Schema::table('states', function (Blueprint $table) {
            $table->boolean('status')->default(1)->after('name');
            $table->dropTimestamps();
        });
        Schema::table('cities', function (Blueprint $table) {
            $table->boolean('status')->default(1)->after('name');
            $table->dropTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('states', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->timestamps();
        });
        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->timestamps();
        });
    }
};

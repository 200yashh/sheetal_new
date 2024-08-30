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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('first_name', 255)->after('id')->nullable();
            $table->string('last_name', 255)->after('first_name')->nullable();
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->string('phone', 191)->after('email')->nullable();
            $table->text('address')->after('phone')->nullable();
            $table->bigInteger('zipcode')->after('address')->nullable();
            $table->string('state', 255)->after('zipcode')->nullable();
            $table->string('country', 255)->after('state')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->string('email')->nullable(false)->change();
            $table->string('password')->nullable(false)->change();
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('zipcode');
            $table->dropColumn('state');
            $table->dropColumn('country');
        });
    }
};

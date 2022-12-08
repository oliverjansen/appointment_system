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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('resident_firstname')->nullable();
            $table->string('resident_middlename')->nullable();
            $table->string('resident_lastname')->nullable();
            // $table->string('resident_contactnumber')->unique();
            $table->string('resident_gender')->nullable();
            $table->string('resident_birthdate')->nullable();
            $table->string('resident_age')->nullable();
            $table->string('resident_address')->nullable();
            $table->string('resident_barangay')->nullable();
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
        Schema::dropIfExists('residents');
    }
};

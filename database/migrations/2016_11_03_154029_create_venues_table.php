<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration
{
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('venue_name');
            $table->string('venue_note');
            $table->string('street_address');
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('zip_code', 5);
            $table->float('lat', 10,6);
            $table->float('lng', 10,6);
            $table->boolean('active')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('venues');
    }
}
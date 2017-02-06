<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->integer('venue_id')->unsigned()->index();
            $table->string('event_name');
            $table->string('event_title');
            $table->text('event_description');
            $table->string('event_image')->nullable();
            $table->dateTime('event_date');
            $table->dateTime('starts_at');
            $table->dateTime('stops_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}

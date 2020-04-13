<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('event_id');
            $table->integer('organizer_id_for_event');
            $table->string('event_name', 75);
            $table->date('event_date');
            $table->string('event_track', 45);

            $table->primary('event_id');
            $table->foreign('organizer_id_for_event', 'organizer_id_for_event_event_organizer_id')->references('event_organizer_id')->on('event_organizers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}

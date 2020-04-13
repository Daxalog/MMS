<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerEventRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_event_registrations', function (Blueprint $table) {
            $table->integer('worker_event_registration_id');
            $table->integer('worker_event_registration_worker_id');
            $table->integer('worker_event_registration_event_id');
            $table->string('worker_event_registration_comments', 255);
            $table->string('revised_registration', 1);
            $table->string('worker_selection_status', 1)->nullable();
            $table->date('worker_event_registration_date');
            $table->boolean('worker_selection_communicated');

            $table->primary('worker_event_registration_id');
            $table->foreign('worker_event_registration_worker_id', 'worker_event_registration_worker_id_worker_id')->references('worker_id')->on('workers');
            $table->foreign('worker_event_registration_event_id', 'worker_event_registration_event_id_event_id')->references('event_id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worker_event_registrations');
    }
}

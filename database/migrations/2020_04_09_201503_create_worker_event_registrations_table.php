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
            $table->id('ID');
            $table->unsignedBigInteger('WorkerID');
            $table->unsignedBigInteger('EventID');
            $table->string('comments');
            $table->string('RevisedRegistration');
            $table->date('Date');
            $table->timestamps();

            $table->foreign('WorkerID')->references('ID')->on('workers');
            $table->foreign('EventID')->references('ID')->on('events');

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

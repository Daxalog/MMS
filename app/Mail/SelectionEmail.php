<?php

namespace App\Mail;

use App\Event;
use App\Worker;
use App\WorkerEventRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SelectionEmail extends Mailable
{
    use Queueable, SerializesModels;

    //Additional message to appear on the email
    public $bodyMessage;
    //The worker that the email is being sent to
    public $recipient;
    //List of workers that are registered for at least one selected event
    public $workers;
    //List of selected events
    public $events;
    //List of registrations for selected events
    public $selections;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $emailMessage, Worker $recipientWorker, array $registeredWorkers, array $selectedEvents, array $workerSelections)
    {
        $this->bodyMessage = $emailMessage;
        $this->recipient = $recipientWorker;
        $this->workers = $registeredWorkers;
        $this->events = $selectedEvents;
        $this->selections = $workerSelections;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.selection');//->with(['message' => $this->message, 'recipient' => $this->recipient, 'workers' => $this->workers, 'events' => $this->events, 'selections' => $this->selections]);
    }
}

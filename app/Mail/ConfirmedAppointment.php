<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmedAppointment extends Mailable
{
    use Queueable, SerializesModels;

    public $name2;
    public $appointmentDate;
    public $dayType;
    public $startTime;
    public $endTime;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $appointmentDate, $dayType, $startTime, $endTime)
    {
        $this->name2 = $name;
        $this->appointmentDate = $appointmentDate;
        $this->dayType = $dayType;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('confirmed-appointment')
                    ->subject('Thank you for contacting us!');
    }
}

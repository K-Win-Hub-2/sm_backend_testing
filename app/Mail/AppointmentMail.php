<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentMail extends Mailable
{
    public $name2;
    public $appointment_date;
    public $appointment_time;
    public $appointment_purpose;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $appointment_date, $appointment_time, $appointment_purpose)
    {
        $this->name2 = $name;
        $this->appointment_date = $appointment_date;
        $this->appointment_time = $appointment_time;
        $this->appointment_purpose = $appointment_purpose;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('appointment-email')
                    ->subject('Appointment Confirmation - Shwe Maw Kun Private School')
                    ->with([
                        'name2' => $this->name2,
                        'appointment_date' => $this->appointment_date,
                        'appointment_time' => $this->appointment_time,
                        'appointment_purpose' => $this->appointment_purpose,
                    ]);
    }
}

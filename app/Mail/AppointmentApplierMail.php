<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentApplierMail extends Mailable
{
    public $name;
    public $booking_date;
    public $booking_slot;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $booking_date, $booking_slot)
    {
        $this->name = $name;
        $this->booking_date = $booking_date;
        $this->booking_slot = $booking_slot;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('appointment-applier-email')
                    ->subject('Thank you for your appointment!')
                    ->with([
                        'name' => $this->name,
                        'booking_date' => $this->booking_date,
                        'booking_slot' => $this->booking_slot
                    ]);
    }
}

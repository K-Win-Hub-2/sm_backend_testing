<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $parent_name;
    public $student_name;
    public $email;
    public $phone;
    public $booking_date;
    public $dayType;
    public $start_time;
    public $end_time;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $parent_name, $student_name, $email, $phone, $booking_date, $dayType, $start_time, $end_time)
    {
        $this->name = $name;
        $this->parent_name = $parent_name;
        $this->student_name = $student_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->booking_date = $booking_date;
        $this->dayType = $dayType;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
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
                        'name' => $this->name,
                        'parent_name' => $this->parent_name,
                        'student_name' => $this->student_name,
                        'email' => $this->email,
                        'phone' => $this->phone,
                        'booking_date' => $this->booking_date,
                        'dayType' => $this->dayType,
                        'start_time' => $this->start_time,
                        'end_time' => $this->end_time,
                    ]);
    }
}

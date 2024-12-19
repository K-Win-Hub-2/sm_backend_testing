<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CareerMail extends Mailable
{
    public $name2;
    public $studied;
    public $position;
    public $phone;
    public $email;
    public $estatus;
    public $about;
    public $filePath;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name2, $filePath, $studied, $position, $phone, $email, $estatus, $about)
    {
        $this->name2 = $name2;
        $this->filePath = $filePath;
        $this->studied = $studied;
        $this->position = $position;
        $this->phone = $phone;
        $this->email = $email;
        $this->estatus = $estatus;
        $this->about = $about;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('career-email')
            ->subject('New message from Career Section')
            ->attach($this->filePath, [
                'as' => 'resume_' . $this->name2 . '.' . pathinfo($this->filePath, PATHINFO_EXTENSION),
                'mime' => mime_content_type($this->filePath),
            ])
            ->with([
                'name2' => $this->name2,
                'studied' => $this->studied,
                'position' => $this->position,
                'phone' => $this->phone,
                'email' => $this->email,
                'estatus' => $this->estatus,
                'about' => $this->about,
            ]);
    }

}

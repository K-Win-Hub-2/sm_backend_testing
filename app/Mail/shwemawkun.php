<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class shwemawkun extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $studied;
    public $position;
    public $phone;
    public $email;
    public $about;
    public $filename;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data1,$data2,$data3,$data4,$data5,$data6,$filename1)
    {
        $this->name =     $data1;
        $this->studied =  $data2;
        $this->position = $data3;
        $this->phone =    $data4;
        $this->email =    $data5;
        $this->about =    $data6;
        $this->filename=public_path('storage/cv' . '/' . $filename1);
  
    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        return $this->view('shwemawkun')->subject('You have one new applicant ')->attach($this->filename);
        
    }
}

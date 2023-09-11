<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class waitlist extends Mailable
{
  use Queueable, SerializesModels;
  public $formdate;
  public $studentname;
  public $gender;
  public $dateofbirth;
  public $course;
  public $ans1;
  public $ans2;
  public $ans3;
  public $ans4;
  public $ans5;
  public $ans6;
  public $ans7;
  public $ans8;
  public $ans9;
  public $ans10;
  public $ans11;
  public $ans12;
  public $ans13;
  public $ans14;
  public $ans15;
  public $ans16;
  public $ans17;
  public $ans18;
  public $subname;
  public $subemail;
  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($waitinglist)
  {
    $this->formdate = $waitinglist->formdate;
    $this->studentname = $waitinglist->studentname;
    $this->gender = $waitinglist->gender;
    $this->dateofbirth = $waitinglist->dateofbirth;
    $this->course = $waitinglist->course;
    $this->ans1 = $waitinglist->ans1;
    $this->ans2 = $waitinglist->ans2;
    $this->ans3 = $waitinglist->ans3;
    $this->ans4 = $waitinglist->ans4;
    $this->ans5 = $waitinglist->ans5;
    $this->ans6 = $waitinglist->ans6;
    $this->ans7 = $waitinglist->ans7;
    $this->ans8 = $waitinglist->ans8;
    $this->ans9 = $waitinglist->ans9;
    $this->ans10 = $waitinglist->ans10;
    $this->ans11 = $waitinglist->ans11;
    $this->ans12 = $waitinglist->ans12;
    $this->ans13 = $waitinglist->ans13;
    $this->ans14 = $waitinglist->ans14;
    $this->ans15 = $waitinglist->ans15;
    $this->ans16 = $waitinglist->ans16;
    $this->ans17 = $waitinglist->ans17;
    $this->ans18 = $waitinglist->ans18;
    $this->subname = $waitinglist->subname;
    $this->subemail = $waitinglist->subemail;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    // $emailData = {
    // }
    return $this->view('shwemawkun2')->subject('You have one new register ');
  }
}

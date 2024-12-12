<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaySlot extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function bookingSlot()
    {
        return $this->belongsTo(BookingSlot::class);
    }
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}

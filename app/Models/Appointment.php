<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'appointment_course');
    }
    public function daySlot()
    {
        return $this->hasOne(DaySlot::class,'appointment_id');
    }
    public function bookingSlot()
    {
        return $this->belongsTo(BookingSlot::class);
    }
}

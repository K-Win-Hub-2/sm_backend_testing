<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingSlot extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function daySlot()
    {
        return $this->hasMany(DaySlot::class);
    }
}

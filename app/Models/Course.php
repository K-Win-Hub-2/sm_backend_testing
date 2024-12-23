<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['class_type','year_level','intake','fromMonth','toMonth', 'list_order','curriculum'];
    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_course');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarController extends Model
{
    use HasFactory;
    protected $fillable = ['academic_id','calender_name','calender_startdate','calender_enddate','type','description','color'];

}

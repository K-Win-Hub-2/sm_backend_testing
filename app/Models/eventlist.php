<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eventlist extends Model
{
    use HasFactory;
    protected $fillable = ['name','content','eventimg','likecount','reactcount'];

}

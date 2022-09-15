<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class waitinglist extends Model
{
    use HasFactory;
    protected $fillable=['formdate','studentname','gender','dateofbirth','course','ans1','ans2','ans3','ans4','ans5',
    'ans6','ans7','ans8','ans9','ans10','ans11','ans12','ans13','ans14','ans15','ans16','ans17','ans18','subname','subemail'];

}
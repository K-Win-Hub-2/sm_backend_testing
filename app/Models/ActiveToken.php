<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveToken extends Model
{
    use HasFactory;
    protected $fillable = ['userid','tokendetail','createdtime','userdeviceid'];


}

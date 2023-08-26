<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory;
    protected $fillable = ['fees_name','fees_types','class_types','year_types','to_year','from_year','extra_types','charges','remark'];

}


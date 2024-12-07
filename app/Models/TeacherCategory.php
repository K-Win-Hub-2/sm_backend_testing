<?php

namespace App\Models;

use App\Models\teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeacherCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function teachers(){
        return $this->hasMany(teacher::class);
    }
}

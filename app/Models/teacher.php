<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    protected $fillable=['teacher_category_id','name','studied','isDisplay','position','message','teacher_photo_path'];

    public function teacher_category(){
	return $this->belongsTo(TeacherCategory::class);
    }
}

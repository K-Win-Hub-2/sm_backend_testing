<?php

namespace App\Models;

use App\Models\teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CredentialPhoto extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function teachers()
    {
        return $this->belongsToMany(teacher::class, 'teacher_credential_photos');
    }
}

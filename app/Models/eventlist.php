<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eventlist extends Model
{
    use HasFactory;
    protected $fillable = ['name','content','eventimg','likecount','reactcount'];
    // Accessor for eventimg (URL)
    public function getEventimgAttribute($value)
    {
        // Check if the value is a relative path (does not contain 'http')
        if ($value && !filter_var($value, FILTER_VALIDATE_URL)) {
            return asset('storage/' . $value);
        }

        // Return the value as is if it is already a complete URL
        return $value;
    }

    // Mutator for eventimg (handling create/update)
    public function setEventimgAttribute($value)
    {
        // If the value is a file, save it to storage and store the relative path
        if (is_file($value)) {
            $this->attributes['eventimg'] = $value->store('event_images', 'public');
        } else {
            // If the value is already a URL, store it as is
            $this->attributes['eventimg'] = $value;
        }
    }
}

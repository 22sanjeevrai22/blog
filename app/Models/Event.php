<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //Event -> events
    //User -> users

    //Overwrite
    //public $table = 'my_events'

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'event_image'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id');
    }
}

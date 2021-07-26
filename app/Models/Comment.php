<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'description',
        'image'
     ];
     public function user()
     {
        return $this->belongsTo(User::class,'user_id');
     }
     public function event()
     {
         return $this->belongsTo(Event::class,'post_id');
     }
}

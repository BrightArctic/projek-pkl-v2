<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['email', 'subject', 'message'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoListItem extends Model
{
    use HasFactory;

    protected $table = 'todolist';
    protected $fillable = ['name', 'subject', 'message', 'image_path'];  // Adjusted to match the column names in your migration file
    protected $guarded = ['id'];
}


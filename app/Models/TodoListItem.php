<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TodoListItem;

class TodoListItem extends Model
{
    use HasFactory;
    protected $table = 'todolist';
    protected $fillable = ['bug_report_id', 'name', 'subject', 'message'];
}

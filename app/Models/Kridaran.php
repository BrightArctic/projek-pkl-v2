<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kridaran extends Model
{
    use HasFactory;
    protected $table = 'kridarans'; // Ensure this matches your actual table name
    protected $fillable = ['name', 'email', 'message']; // Add other fields as needed
}

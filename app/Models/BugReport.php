<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// BugReport.php model
class BugReport extends Model
{
    protected $table = 'bug_reports'; // Ensure this matches your actual table name
    protected $fillable = ['name', 'email', 'subject', 'message', 'image_path']; // Add other fields as needed
}


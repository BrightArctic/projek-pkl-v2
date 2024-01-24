<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\DB;

class AnnouncementController extends Controller
{
    public function postAnnouncement(Request $request)
{
    $request->validate([
        'message' => 'required|string',
    ]);

    Announcement::create([
        'message' => $request->input('message'),
    ]);

    DB::table('announcements')->insert([
        'message' => $request->input('message'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect('/dashboard-general-dashboard')->with('success', 'Announcement posted successfully');
}

}

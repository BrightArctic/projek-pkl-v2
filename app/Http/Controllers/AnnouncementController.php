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

        $userName = $request->input('userName'); // Retrieve the user's name from the request

        Announcement::create([
            'message' => $request->input('message'),
            'user_name' => $userName, // Store the user's name along with the announcement message
        ]);

        DB::table('announcements')->insert([
            'message' => $request->input('message'),
            'user_name' => $userName, // Store the user's name along with the announcement message
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/dashboard-general-dashboard')->with('success', 'Announcement posted successfully');
    }
}

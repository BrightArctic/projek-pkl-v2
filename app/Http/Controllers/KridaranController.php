<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kridaran; // Import the Kridaran model

class KridaranController extends Controller
{
    public function showKridaran()
    {
        return view('PusatBantuan.kridaran');
    }

    public function submitKridaran(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
            // Add more validation rules as needed
        ]);

        // Logic to handle kritik dan saran submission
        $kridaranData = [
            'name'    => $request->input('name'),
            'email'   => $request->input('email'),
            'message' => $request->input('message'),
            // Add more fields as needed
        ];

        // Save to the database
        Kridaran::create($kridaranData);

        // Redirect or respond as needed
        return response()->json(['message' => 'Kritik dan saran submitted successfully.'], 200);
    }
}

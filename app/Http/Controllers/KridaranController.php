<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kridaran;

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

    public function kridaranAdmin()
    {
        try {
            $kridaranData = Kridaran::all();
            // dd($kridaranData); // Add this line to check if data is retrieved
        } catch (QueryException $e) {
            // Handle the exception when the table doesn't exist
            $kridaranData = [];
        }

        return view('PusatBantuan.kridaranadmin', compact('kridaranData'));
    }

    public function deleteBugKridaran($id)
    {
        $kridaran = Kridaran::find($id);

        if ($kridaran) {
            // Delete the kridaran data
            $kridaran->delete();
            return response()->json(['message' => 'Kridaran data deleted successfully.']);
        } else {
            return response()->json(['error' => 'Kridaran data not found.'], 404);
        }
    }
}

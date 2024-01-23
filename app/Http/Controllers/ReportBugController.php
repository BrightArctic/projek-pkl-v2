<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\BugReport;
use Illuminate\Support\Facades\Redirect;

class ReportBugController extends Controller
{
    public function showForm()
    {
        return view('Bug.bugreport'); // Assuming you have a bugreport.blade.php file
    }

    public function submit(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max file size: 2MB
        ]);

            // Logic to handle bug report submission
    $bugReportData = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'subject' => $request->input('subject'),
        'message' => $request->input('message'),
    ];

      // Check if an image is provided
      if ($request->hasFile('image')) {
        // Upload the image and store its path
        $imagePath = $request->file('image')->store('bug_reports', 'public');
        // Hash the image path before saving to the database
        $hashedImagePath = Hash::make($imagePath);
        $bugReportData['image_path'] = $hashedImagePath;
    }
        // Logic to handle bug report submission
        // You can save the bug report to the database, send emails, etc.
        BugReport::create($bugReportData);

        // Redirect to the named route
        return redirect()->route('bugreport.form')->with('success', 'Bug report submitted successfully!');
    }

    public function bugReportAdmin()
    {
        try {
            $bugReports = BugReport::all();
            // dd($bugReports); // Add this line to check if data is retrieved
        } catch (QueryException $e) {
            // Handle the exception when the table doesn't exist
            $bugReports = [];
        }

        return view('Bug.bugreportadmin', compact('bugReports'));
    }

    public function deleteBugReport($id)
    {
    $bugReport = BugReport::find($id);

    if ($bugReport) {
        // Delete the bug report
        $bugReport->delete();
        return response()->json(['message' => 'Bug report deleted successfully.']);
    } else {
        return response()->json(['error' => 'Bug report not found.'], 404);
    }
    }
}

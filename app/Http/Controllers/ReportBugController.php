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
        // Upload the image to Cloudinary and store its URL
        $uploadedFile = $request->file('image');
        $imagePath = cloudinary()->upload($uploadedFile->getRealPath())->getSecurePath();
        $bugReportData['image_path'] = $imagePath;
    }
        // Logic to handle bug report submission
        // You can save the bug report to the database, send emails, etc.
        BugReport::create($bugReportData);

        // Redirect to the named route
        return response()->json(['message' => 'Bug report submitted successfully.'], 200);
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

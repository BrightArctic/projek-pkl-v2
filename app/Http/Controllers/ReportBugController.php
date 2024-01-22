<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        ]);

        // Logic to handle bug report submission
        // You can save the bug report to the database, send emails, etc.
        BugReport::create($request->all());

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
}

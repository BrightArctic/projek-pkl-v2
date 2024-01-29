<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TodoListItem;
use App\Models\BugReport;


class TodoListController extends Controller
{
    public function index()
    {
        $todoListItems = TodoListItem::all(); // Fetch all items in the to-do list

        return view('GeneralDashboard.todo-list', compact('todoListItems'));
    }

    public function addToTodoList(Request $request)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'bugReportId' => 'required|integer',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
    }

    // If validation passes, proceed with creating the to-do list item
    try {
        // Retrieve bug report information based on bugReportId
        $bugReport = BugReport::findOrFail($request->input('bugReportId'));

        // Create a new to-do list item using the bug report information
        TodoListItem::create([
            'bug_report_id' => $bugReport->id,
            'name' => $bugReport->name,
            'subject' => $bugReport->subject,
            'message' => $bugReport->message,
        ]);

        // Return a success response
        return response()->json(['success' => true, 'message' => 'Bug report added to the to-do list.']);
    } catch (\Exception $e) {
        // Return an error response if something went wrong
        return response()->json(['success' => false, 'message' => 'Failed to add bug report to the to-do list.']);
    }
}


}

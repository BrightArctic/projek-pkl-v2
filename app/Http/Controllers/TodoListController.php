<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoListItem; // Import the TodoListItem model

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
        $validatedData = $request->validate([
            'bugReportId' => 'required|integer',
            'name' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        try {
            // Create a new to-do list item using the bug report information
            TodoListItem::create([
                'bug_report_id' => $validatedData['bugReportId'],
                'name' => $validatedData['name'],
                'subject' => $validatedData['subject'],
                'message' => $validatedData['message'],
            ]);

            // Return a success response
            return response()->json(['success' => true, 'message' => 'Bug report added to the to-do list.']);
        } catch (\Exception $e) {
            // Return an error response if something went wrong
            return response()->json(['success' => false, 'message' => 'Failed to add bug report to the to-do list.']);
        }
    }
}

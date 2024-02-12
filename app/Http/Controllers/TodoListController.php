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
        $todoListItems = TodoListItem::all();
        return view('GeneralDashboard.todo-list', compact('todoListItems'));
    }

    public function addToTodoList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bugReportId' => 'integer',
            'kridaranId' => 'integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for image
            // Add validation rules for other fields if needed
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

    try {
        $todoItemData = [];

        // Check if an image is provided
        if ($request->hasFile('image')) {
            // Upload the image to Cloudinary and store its URL
            $uploadedFile = $request->file('image');
            $imagePath = cloudinary()->upload($uploadedFile->getRealPath())->getSecurePath();
            $todoItemData['image_path'] = $imagePath;
        }
        if ($request->has('bugReportId')) {
            // Handle bug report data
            $bugReport = BugReport::findOrFail($request->input('bugReportId'));
            TodoListItem::create([
                'bug_report_id' => $bugReport->id,
                'name' => $bugReport->name,
                'subject' => $bugReport->subject,
                'message' => $bugReport->message,
            ]);
            return response()->json(['success' => true, 'message' => 'Bug report added to the to-do list.']);
        } elseif ($request->has('kridaranId')) {
            // Handle kridaran data here
            $name = $request->input('name');
            $message = $request->input('message');

            // Set a default subject for Kridaran
            $subject = 'null (dari kridaran)';

            // Create todo list item for kridaran data
            TodoListItem::create([
                'name' => $name,
                'subject' => $subject,
                'message' => $message,
            ]);

            // Set session variable to indicate new item from Kridaran
            session()->flash('kridaran_notification', true);

            return response()->json(['success' => true, 'message' => 'Kridaran data added to the to-do list.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid request.']);
        }
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Failed to add item to the to-do list.']);
    }
}




    public function delete($id)
    {
        TodoListItem::destroy($id);
        return redirect()->back()->with('success', 'Item deleted successfully!');
    }
}


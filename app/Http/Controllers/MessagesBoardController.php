<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class MessagesBoardController extends Controller
{
    public function showPostMessages()
    {
        return view('Messages.MessagesForm'); // Assuming you have a MessagesForm.blade.php file
    }

    public function submitMessage(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
    ]);

    Log::info('Submit message request received.'); // Log a message to indicate the request is received

    // Debugging: Check the data received from the form
    Log::info('Form data:', $request->all());

    $user = User::where('email', $request->input('email'))->first();

    if (!$user) {
        Log::error('User not found for email: ' . $request->input('email')); // Log an error if user not found
        return response()->json(['error' => 'User not found for email: ' . $request->input('email')], 404);
    }

    $message = new Message([
        'email' => $request->input('email'),
        'subject' => $request->input('subject'),
        'message' => $request->input('message'),
    ]);

    // Save the message in the database
    $message->save();

    return response()->json(['message' => 'Message sent successfully.']);
    }

    public function showUserMessages()
    {
        // Retrieve messages for the authenticated user
        $userMessages = Message::where('user_id', Auth::id())->get();

        // Pass the messages to a view for display
        return view('user_messages', ['messages' => $userMessages]);
    }
}

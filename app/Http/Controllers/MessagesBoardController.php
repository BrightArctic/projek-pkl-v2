<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        $message = new Message([
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        $user->messages()->save($message);

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

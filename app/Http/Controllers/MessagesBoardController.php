<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesBoardController extends Controller
{
     public function showPostMessages()
    {
        return view('Messages.MessagesForm'); // Assuming you have a bugreport.blade.php file
    }

    public function submitMessage(Request $request)
{
    // Validate form data
    $validatedData = $request->validate([
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    // Create a new message instance
    $message = new Message();
    $message->email = $validatedData['email'];
    $message->subject = $validatedData['subject'];
    $message->message = $validatedData['message'];
    $message->save();

    // Optionally, you can return a response or redirect
    return redirect()->back()->with('success', 'Message sent successfully!');
}

}

<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatsController extends Controller
{

    public function index()
    {
        return view('message');
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'message' => $request->message
        ]);

		broadcast(new MessageSent(auth()->user(), $message))->toOthers();

        return response()->json([
            'success' => true,
            'status' => 'Message Sent!',
            'data' => $message
        ]);
    }
}

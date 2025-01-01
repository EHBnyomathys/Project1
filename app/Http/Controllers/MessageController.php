<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function inbox()
    {
        $messages = Message::where('receiver_id', Auth::id())
            ->with('sender')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('messages.inbox', compact('messages'));
    }

    public function sent()
    {
        $messages = Message::where('sender_id', auth()->id())
            ->with('receiver')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('messages.sent', compact('messages'));
    }

    public function show($id)
    {
        $message = Message::where('receiver_id', Auth::id())
            ->orWhere('sender_id', Auth::id())
            ->findOrFail($id);

        if ($message->receiver_id === Auth::id()) {
            $message->update(['is_read' => true]);
        }

        return view('messages.show', compact('message'));
    }

    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('messages.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string'
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content
        ]);

        return redirect()->route('messages.sent')->with('success', 'Bericht verzonden!');
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);

        if ($message->sender_id === Auth::id() || $message->receiver_id === Auth::id()) {
            $message->delete();
            return redirect()->route('messages.inbox')->with('success', 'Bericht verwijderd!');
        }

        return redirect()->route('messages.inbox')->with('error', 'Je hebt geen toegang tot dit bericht.');
    }
}

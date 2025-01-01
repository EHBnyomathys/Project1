<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();
        return view('admin.contact_messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('admin.contact_messages.show', compact('message'));
    }

    public function update(Request $request, $id)
    {
        $message = ContactMessage::findOrFail($id);
        $request->validate([
            'admin_reply' => 'required|string'
        ]);

        $message->update([
            'is_replied' => true,
            'admin_reply' => $request->admin_reply,
        ]);

        return redirect()->route('admin.contact_messages.index')
            ->with('success', 'Bericht succesvol beantwoord.');
    }

    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.contact_messages.index')
            ->with('success', 'Bericht verwijderd.');
    }
}

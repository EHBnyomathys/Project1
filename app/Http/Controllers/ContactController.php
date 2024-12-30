<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact.index');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $contactMessage = ContactMessage::create($request->all());

        Mail::raw(
            "Nieuw bericht van: {$request->name}\nEmail: {$request->email}\nOnderwerp: {$request->subject}\nBericht: {$request->message}",
            function ($message) {
                $message->to('admin@mail.com')
                        ->subject('Nieuw Contactformulier Bericht');
            }
        );

        return redirect()->route('contact.show')->with('success', 'Je bericht is verzonden!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'nombre'   => 'required|string|max:200',
            'email'    => 'required|email|max:200',
            'telefono' => 'nullable|string|max:50',
            'asunto'   => 'nullable|string|max:200',
            'mensaje'  => 'required|string|max:5000',
        ]);

        $recipient = env('CONTACT_RECIPIENT', 'info@sanzahra.com');

        Mail::to($recipient)->send(new ContactFormMail($data));

        return back()->with('contact_success', '¡Mensaje enviado! Te responderemos en menos de 24 horas laborables.');
    }
}

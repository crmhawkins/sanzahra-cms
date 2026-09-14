<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Mail\TalentoFormMail;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
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

        if ($this->isSpam($request)) {
            Log::info('Contact form spam blocked', ['ip' => $request->ip(), 'email' => $request->input('email')]);

            // Respuesta idéntica a la de éxito: el bot no aprende qué le delató.
            return back()->with('contact_success', '¡Mensaje enviado! Te responderemos en menos de 24 horas laborables.');
        }

        $recipient = env('CONTACT_RECIPIENT', 'info@sanzahra.com');

        Mail::to($recipient)->send(new ContactFormMail($data));

        return back()->with('contact_success', '¡Mensaje enviado! Te responderemos en menos de 24 horas laborables.');
    }

    /**
     * Formulario "Buscamos la próxima generación" (captación de talento, página /moda).
     */
    public function talento(Request $request)
    {
        $data = $request->validateWithBag('talento', [
            'nombre'    => 'required|string|max:200',
            'email'     => 'required|email|max:200',
            'telefono'  => 'nullable|string|max:50',
            'perfil'    => 'required|string|max:200',
            'portfolio' => 'nullable|string|max:500',
            'mensaje'   => 'required|string|max:5000',
        ]);

        $successMessage = 'Candidatura recibida. Gracias por tu interés: nuestro equipo la revisará y te contactará si hay una oportunidad que encaje.';

        if ($this->isSpam($request)) {
            Log::info('Talento form spam blocked', ['ip' => $request->ip(), 'email' => $request->input('email')]);

            // Respuesta idéntica a la de éxito: el bot no aprende qué le delató.
            return redirect()->to(url('/moda') . '#talento')->with('talento_success', $successMessage);
        }

        $recipient = env('CONTACT_RECIPIENT', 'info@sanzahra.com');
        $cc = array_values(array_filter(array_map('trim', explode(',', (string) env('CONTACT_CC', '')))));

        $mail = Mail::to($recipient);
        if ($cc) {
            $mail->cc($cc);
        }
        $mail->send(new TalentoFormMail($data));

        Log::info('Talento form sent', ['to' => $recipient, 'cc' => $cc, 'from' => $data['email']]);

        return redirect()->to(url('/moda') . '#talento')->with('talento_success', $successMessage);
    }

    private function isSpam(Request $request): bool
    {
        // Honeypot: campo invisible para humanos; los bots lo rellenan.
        if ($request->filled('website')) {
            return true;
        }

        // Trampa de tiempo: el token cifrado se genera al renderizar la página.
        // Sin token (POST directo sin visitar la página) o envío en <3s = bot.
        try {
            $renderedAt = (int) Crypt::decryptString((string) $request->input('form_time'));
        } catch (DecryptException) {
            return true;
        }

        if (now()->timestamp - $renderedAt < 3) {
            return true;
        }

        // Más de 2 enlaces en el mensaje = spam típico de SEO/phishing.
        if (preg_match_all('/https?:\/\/|www\./i', (string) $request->input('mensaje')) > 2) {
            return true;
        }

        return false;
    }
}

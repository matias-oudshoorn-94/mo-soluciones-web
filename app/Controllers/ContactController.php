<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\ContactMessage;

final class ContactController extends Controller
{
    /** Segundos mínimos entre dos envíos desde la misma sesión. */
    private const int THROTTLE_SECONDS = 30;

    public function index(): void
    {
        $this->view('contact', [
            'services'  => ContactMessage::SERVICES,
            'errors'    => Session::pull('errors', []),
            'old'       => Session::pull('old', []),
            'alert'     => Session::pull('alert'),
            'csrf'      => Session::csrfToken(),
            'formStart' => time(),
            'preset'    => (string) ($_GET['servicio'] ?? ''),
        ], [
            'title'       => 'Contacto',
            'description' => 'Contanos sobre tu proyecto y en menos de 24 horas hábiles tenés tu presupuesto. Nos encargamos de todo: dominio, hosting y emails.',
        ]);
    }

    public function send(): void
    {
        if (!Session::verifyCsrf($_POST['_token'] ?? null)) {
            Session::flash('alert', 'La sesión expiró. Volvé a enviar el formulario.');
            $this->redirect('/contacto');
        }

        // Anti-spam: campo trampa oculto y formulario enviado demasiado rápido.
        $tooFast = (time() - (int) ($_POST['_ts'] ?? 0)) < 3;
        if (!empty($_POST['website']) || $tooFast) {
            $this->redirect('/contacto/gracias');
        }

        $last = (int) ($_SESSION['_last_contact'] ?? 0);
        if (time() - $last < self::THROTTLE_SECONDS) {
            Session::flash('alert', 'Ya recibimos un mensaje hace instantes. Esperá unos segundos para enviar otro.');
            $this->redirect('/contacto');
        }

        $message = ContactMessage::fromArray($_POST);

        if (!$message->validate()) {
            Session::flash('errors', $message->errors());
            Session::flash('old', $message->toArray());
            $this->redirect('/contacto#formulario');
        }

        $stored = $message->store();
        $sent = $message->send();

        if (!$stored && !$sent) {
            Session::flash('alert', 'No pudimos enviar tu mensaje. Escribinos por WhatsApp o email y te respondemos enseguida.');
            Session::flash('old', $message->toArray());
            $this->redirect('/contacto#formulario');
        }

        $_SESSION['_last_contact'] = time();
        Session::flash('contact_name', $message->name);
        $this->redirect('/contacto/gracias');
    }

    public function thanks(): void
    {
        $this->view('thanks', ['name' => Session::pull('contact_name', '')], [
            'title' => '¡Gracias por tu mensaje!',
        ]);
    }
}

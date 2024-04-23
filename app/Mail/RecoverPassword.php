<?php

namespace App\Mail;

use App\Models\Debtor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RecoverPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $debtor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Debtor $debtor)
    {
        $this->debtor = $debtor;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: data_get(config('mail.from'), 'address'),
            subject: 'Solicitud de recuperacion de contraseña',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.recoverPassword',
            with: [
                'debtor' => $this->debtor
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}

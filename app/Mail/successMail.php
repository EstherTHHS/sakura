<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class successMail extends Mailable
{
    use Queueable, SerializesModels;

    private $addmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailPara)
    {
        $this->addmail = $mailPara;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Is AI coming for our jobs?',
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
            view: 'mail.welMail',
            with: [
                'titleMail' => $this->addmail["titleMail"],
                'mailbody' => $this->addmail["mailbody"],
                'by' => $this->addmail["by"]
            ],
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

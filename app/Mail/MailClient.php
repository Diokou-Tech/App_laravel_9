<?php

namespace App\Mail;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class MailClient extends Mailable
{
    use Queueable, SerializesModels;
    public $contact;
    public string $path;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact = null, $path = "")
    {
        $this->contact = $contact;
        $this->path = $path;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('diokoucheikh@gmail.com', 'Cheikhou DIOKOU'),
            subject: 'Mail Client',
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
            view: 'mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        $pathFile = storage_path('app/public/files/Profile.pdf');

        return Attachment::fromPath($pathFile)->as('Mon_Profile')->withMime('application/pdf');
    }
}

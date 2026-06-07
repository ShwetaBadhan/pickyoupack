<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $quoteData;

    public function __construct($quoteData)
    {
        $this->quoteData = $quoteData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Bulk Quote Request - PickYourPack',
            replyTo: [$this->quoteData['email'] ?? 'noreply@dsinnovativesolutions.com'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.quote-request',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
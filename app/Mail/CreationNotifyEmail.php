<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreationNotifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(private string $productName)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Product Created Class',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.Product_mail',
            with: ['productName' => $this->productName],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;

    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invoice Email - '.env('APP_NAME'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.invoice',
            with: [
                'invoice' => $this->invoice,   // lebih jelas daripada "data"
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

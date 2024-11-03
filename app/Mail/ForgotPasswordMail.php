<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Headers;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $token;
    public $name;

    /**
     * Create a new message instance.
     */
    public function __construct($token, $name)
    {
        $this->token = $token;
        $this->name = $name;
    }

    public function headers()
    {
        return new Headers(
            text: [
                'X-SES-CONFIGURATION-SET' => 'my-first-configuration-set',
            ]
        );
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Forgot Password Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.forgot-password',
            with: [
                'baseUrlOfFE'      => env('APP_URL'),
                'resetPasswordUrl' => env('APP_URL')
                    . "/update-forgotten-password/" . $this->token,
                'token'            => $this->token,
                'name'         => $this->name,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

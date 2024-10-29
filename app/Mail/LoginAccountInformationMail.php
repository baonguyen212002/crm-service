<?php

    namespace App\Mail;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
    use Illuminate\Mail\Mailables\Headers;
    use Illuminate\Queue\SerializesModels;

    class LoginAccountInformationMail extends Mailable implements ShouldQueue
    {
        use Queueable, SerializesModels;

        public $email;
        public $password;

        /**
         * Create a new message instance.
         */
        public function __construct($email, $password)
        {
            $this->email = $email;
            $this->password = $password;
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
                subject: 'Login Account Information Mail',
            );
        }

        /**
         * Get the message content definition.
         */
        public function content(): Content
        {
            return new Content(
                view: 'emails.login-account-information',
                with: [
                    'loginUrl'    => env('APP_FE_URL','http://shino-dev.local'),
                    'email'       => $this->email,
                    'password'    => $this->password,
                ],
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

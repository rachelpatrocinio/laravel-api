<?php

namespace App\Mail;

use App\Models\Lead;
use Faker\Provider\ar_EG\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address as MailablesAddress;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewLead extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;
    /**
     * Create a new message instance.
     */
    public function __construct(Lead $_lead)
    {   
        //istanza della classe Lead 
        $this->lead = $_lead;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Lead',
            // possiamo anche specificarlo in .env nel MAIL_FROM_ADDRESS e MAIL_FROM_NAME
            // from: new MailablesAddress('')
            // replyTo: $this->lead->email
            replyTo: [
                new MailablesAddress($this->lead->email, $this->lead->name)
            ]
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.new-lead',
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

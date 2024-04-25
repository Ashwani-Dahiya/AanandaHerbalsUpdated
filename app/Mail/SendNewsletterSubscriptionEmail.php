<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewsletterSubscriptionEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $websiteLink;

    /**
     * Create a new message instance.
     *
     * @param  string  $websiteLink
     * @return void
     */
    public function __construct($websiteLink)
    {
        $this->websiteLink = $websiteLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newsletter_subscription_email')->with(['websiteLink' => $this->websiteLink]);
    }
}

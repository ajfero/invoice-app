<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable; // Libreria que se encarga de toda la gestion de mails
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice, $details)
    {
        $this->invoice = $invoice;
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        // return $this->view('mails.invoice', ['invoice' => $this->invoice, 'details' => $this->details]);
        // In this view is created  a link to the invoice for rendder and create content mail
        // Rename

        $invoice = $this->invoice;
        $details = $this->details;
        return $this->view('mails.invoice', compact('invoice', 'details'));
    }
}

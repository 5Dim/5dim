<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FinDeRonda extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() // http://homestead.test/panelControl/emailResetRonda
    {
        return $this->from(env('MAIL_FROM_ADDRESS', '5dim.factorio@gmail.com'), env('MAIL_FROM_NAME', '5Dim Team'))
            ->subject('[5DIM] El universo se siente...')
            ->markdown('mails.finalRonda')
            ->with([
                'name' => 'New Mailtrap User',
                'link' => '/inboxes/'
            ]);
    }
}

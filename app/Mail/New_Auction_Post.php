<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Auctions;

class New_Auction_Post extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $auctions;
    public function __construct(Auctions $auctions)
    {
        $this->auctions=$auctions;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nje ankand i ri sapo eshte hapur')
                    ->from('vildanasllani@gmail.com')
                    ->markdown('email.auction');
    }
}

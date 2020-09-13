<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\News;

class New_News_Post extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public $news;
    
    public function __construct(News $news)
    {
        $this->news=$news;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Postim i ri nga EcoHigjiena')
                    ->from('vildanasllani@gmail.com')
                    ->markdown('email.news');
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PokemonMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $pokemon;
    public $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$pokemon,$body)
    {
        $this->user=$user;
        $this->pokemon=$pokemon;
        $this->body=$body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nazam@hackanda.com','You '.$this->body.' a Pokemon')->subject('Pokemon')->view('mail.poke',compact('user','pokemon','body'));
    }
}

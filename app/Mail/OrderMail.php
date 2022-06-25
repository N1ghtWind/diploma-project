<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;


    public $order;
    public $user;
    public $cart_item;
    public $prices;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart_item, $order, $user, $prices)
    {
        $this->cart_item = $cart_item;
        $this->order = $order;
        $this->user = $user;
        $this->prices = $prices;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('diploma@vts.com')
            ->view('mail.order')->with([
                'order' => $this->order,
                'user' => $this->user,
                'cart_item' => $this->cart_item,
                'prices' => $this->prices,
            ]);

    }
}

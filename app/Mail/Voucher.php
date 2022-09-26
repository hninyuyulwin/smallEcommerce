<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Voucher extends Mailable
{
    use Queueable, SerializesModels;
    public $userName;
    public $orders;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $orders)
    {
        $this->userName = $userName;
        $this->orders = $orders;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.voucher')
            ->subject('Order Voucher Recipe')
            ->with(['userName' => $this->userName, 'orders' => $this->orders]);
    }
}

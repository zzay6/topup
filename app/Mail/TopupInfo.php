<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Transactions;

class TopupInfo extends Mailable
{
    use Queueable, SerializesModels;
    public $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->id = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $tr = Transactions::where('order_id',$this->id)->first();

        return $this->view('emails/topup', compact(['tr']));
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $productNames;
    public $productQuantities;
    public $amount;
    public $orderNum;
    public $address;


    /**
     * Create a new message instance.
     *
     * @param  array  $productNames
     * @param  array  $productQuantities
     * @param  float  $totalPrice
     * @param  string  $orderNum
     * @param  array  $address
     * @return void

     */
    public function __construct($productNames, $productQuantities, $amount, $orderNum, $address)
    {
        $this->productNames = $productNames;
        $this->productQuantities = $productQuantities;
        $this->amount = $amount;
        $this->orderNum = $orderNum;
        $this->address = $address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.place_order_email', [
            'productNames' => $this->productNames,
            'productQuantities' => $this->productQuantities,
            'amount' => $this->amount,
            'orderNum'=> $this->orderNum,
            'address' => $this->address,
        ]);
    }
}

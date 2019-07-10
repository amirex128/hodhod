<?php

namespace App\Mail;

use App\model\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Product
     */
    public $product;

    /**
     * Create a new message instance.
     *
     * @param  Product  $product
     */
    public function __construct(Product $product)
    {
        //
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Email.Product');
    }
}

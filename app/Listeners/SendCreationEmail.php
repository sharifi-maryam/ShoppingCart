<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use App\Mail\CreationNotifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendCreationEmail
{
    use InteractsWithQueue;

    public function __construct()
    {
        //
    }

    public function handle(ProductCreated $event)
    {
        // Access the product from the event
        $product = $event->product;

        // Send reservation confirmation email
        $email = 'm.sharifi.3197@gmail.com';

        Mail::to($email)->send(new CreationNotifyEmail($product->name));

    }
}

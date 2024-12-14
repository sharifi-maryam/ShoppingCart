<?php

namespace App\Console\Commands;

use App\Models\ShoppingCart;
use Illuminate\Console\Command;

class ClearOldCarts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-old-carts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle() {
        ShoppingCart::where('created_at', '<', now()->subHours(24))->delete();
    }
}

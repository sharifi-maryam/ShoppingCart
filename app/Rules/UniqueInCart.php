<?php

namespace App\Rules;

use App\Models\Product;
use App\Models\ShoppingCart;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class UniqueInCart implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if the product is already in the user's shopping cart
        $exists = ShoppingCart::where('user_id', auth()->id())
            ->where('item', $value)
            ->exists();

        if ($exists) {
            $fail('You already have this product in your shopping cart.');
        }
    }
}

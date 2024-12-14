<?php

namespace App\Rules;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class InventoryCheck implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Find the product by ID
        $product = Product::find($value);

        // Check if the product exists and its inventory is greater than 0
        if (!$product || $product->inventory < 0) {
            $fail('The selected product is out of stock.');
        }
    }
}

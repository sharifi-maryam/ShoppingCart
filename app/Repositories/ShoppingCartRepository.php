<?php

namespace App\Repositories;

use App\Models\ShoppingCart;

class ShoppingCartRepository implements ShoppingCartInterface
{
    public function all()
    {
        return ShoppingCart::all(); // Return all records from the ShoppingCart model
    }

    public function create(array $data, int $userId)
    {
        // Add user_id to the data array
        $data['user_id'] = $userId;
        $data['item'] = $data['product_id'];

        return ShoppingCart::create($data); // Create a new record using the provided data
    }

    public function delete($productId, $currentUserId)
    {
        ShoppingCart::where('item', $productId) // Filter by item ID
            ->where('user_id', $currentUserId) // Filter by the current user's ID
            ->delete(); // Delete the matching records
    }

    public function find($userId)
    {
        return ShoppingCart::where('user_id', $userId)->get(); // Retrieve all shopping cart records for the specified user
    }
}

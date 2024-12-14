<?php

namespace App\Repositories;

// Define the ShoppingCartInterface which outlines the methods for a shopping cart repository
interface ShoppingCartInterface
{
    // Retrieve all items in the shopping cart
    public function all();

    // Create a new item in the shopping cart with the provided data
    public function create(array $data, int $userId);

    // Delete an item from the shopping cart using the item ID and the current user's ID
    public function delete($id, $currentUserId);

    // Find a specific item in the shopping cart using the user ID
    public function find($userId);
}

<?php

namespace App\Services;

use App\Repositories\ShoppingCartRepository;

class ShoppingCartService
{
    // Constructor method to initialize the ShoppingCartRepository
    public function __construct(
        protected ShoppingCartRepository $shoppingCartRepository // Inject the ShoppingCartRepository dependency
    ) {}

    public function create(array $data)
    {
        $currentUserId = auth()->id(); // Get the authenticated user's ID
        return $this->shoppingCartRepository->create($data, $currentUserId); // Call the create method on the repository with user_id
    }

    // Method to delete a shopping cart entry
    public function delete($productId, $currentUserId)
    {
        return $this->shoppingCartRepository->delete($productId, $currentUserId); // Call the delete method on the repository with productId and current user id
    }

    // Method to retrieve all shopping cart entries
    public function all()
    {
        return $this->shoppingCartRepository->all(); // Call the all method on the repository to get all entries
    }

    // Method to find a specific shopping cart entry by id
    public function find($userId)
    {
        return $this->shoppingCartRepository->find($userId); // Call the find method on the repository with the specified userId
    }
}

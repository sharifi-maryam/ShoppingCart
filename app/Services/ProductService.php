<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    public function __construct(
        protected ProductRepository $productRepository // Inject the ShoppingCartRepository dependency
    ) {}

    public function create(array $data)
    {
        return $this->productRepository->create($data);
    }

    public function all()
    {
        return $this->productRepository->all(); // Call the all method on the repository to get all entries
    }

    // Method to find a specific shopping cart entry by id
    public function find($id)
    {
        return $this->productRepository->find($id); // Call the find method on the repository with the specified id
    }
}

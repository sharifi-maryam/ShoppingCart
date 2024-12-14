<?php

namespace App\Repositories;

// Define the ProductInterface which outlines the methods for a product repository
interface ProductInterface
{
    // Retrieve all products
    public function all();

    // Create a new product with the provided data
    public function create(array $data);

    // Find a specific product using ID
    public function find($id);
}

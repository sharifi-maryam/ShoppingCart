<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository implements ProductInterface
{
    public function all()
    {
        return Product::all(); // Return all products
    }

    public function create(array $data)
    {
        return Product::create($data); // Create a new record using the provided data
    }

    public function find($id)
    {
        return Product::findOrFail($id); // Retrieve the product by ID or fail
    }
}

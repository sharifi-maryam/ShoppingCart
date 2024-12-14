<?php

namespace App\Http\Controllers;

use App\Mail\ProductCreatedClass;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService // Inject the ProductService into the controller
    ) {}
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'inventory' => 'required|integer|min:0',
        ]);

        $this->productService->create($data);
        $product = Product::create($request->validated());
        return response()->json($product, 201);
    }
}

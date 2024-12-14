<?php

namespace App\Http\Controllers;

use App\Rules\InventoryCheck;
use App\Rules\UniqueInCart;
use App\Services\ShoppingCartService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class ShoppingCartController
 * @package App\Http\Controllers
 */
class ShoppingCartController extends Controller
{
    public function __construct(
        protected ShoppingCartService $shoppingCartService // Inject the ShoppingCartService into the controller
    ) {}

    public function store(Request $request) // Define the store method to handle adding items to the cart
    {
        try {
            // Validate the incoming request data
            $data = $request->validate([
                'product_id' => [
                    'required',
                    'integer',
                    'exists:products,id', // Ensure product_id exists in the products table
                    new InventoryCheck, // Apply custom inventory check rule
                    new UniqueInCart, // Apply custom unique in cart rule
                ],
            ]);

            $this->shoppingCartService->create($data);
            return response()->json(['success' => true, 'data' => $data], 200);
        } catch (ValidationException $e) {
            // Return a failure response with validation errors
            return response()->json([
                'success' => false,
                'errors' => $e->validator->errors(),
            ], 422);
        }
    }

    public function show()
    {
        // Find the cart for the authenticated user
        $cart = $this->shoppingCartService->find(auth()->id());

        if (!$cart) {
            // Return a not found response
            return response()->json(['message' => 'cart not found.'], 404);
        }

        // Return the cart data as a JSON response
        return response()->json($cart);
    }

    public function destroy(Request $request)
    {
        try {
            // Get the current authenticated user's ID
            $currentUserId = auth()->id();
            // Delete the specified product from the user's cart
            $this->shoppingCartService->delete($request['product_id'], $currentUserId);

            return response()->json(['message' => 'cart deleted successfully.'], 204);
        } catch (ValidationException $e) {
            // Return a failure response with validation errors
            return response()->json([
                'success' => false,
                'errors' => $e->validator->errors(),
            ], 422);
        }
    }
}

<?php

namespace App\Documentation;

use OpenApi\Annotations as OA;

/**
 * Class ShoppingCartDocumentation
 * @package App\Documentation
 */
class ShoppingCartDocumentation
{
    /**
     * @OA\Tag(
     *     name="Shopping Cart",
     *     description="API endpoints for managing shopping cart"
     * )
     */

    /**
     * @OA\Post(
     *     path="/api/cart",
     *     tags={"Shopping Cart"},
     *     summary="Add an item to the shopping cart",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"product_id"},
     *             @OA\Property(property="product_id", type="integer", example=1, description="ID of the product to add")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Item added successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation errors",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     )
     * )
     */
    public static function addItemToCart() {}

    /**
     * @OA\Get(
     *     path="/api/cart",
     *     tags={"Shopping Cart"},
     *     summary="Retrieve the shopping cart for the authenticated user",
     *     @OA\Response(
     *         response=200,
     *         description="Cart retrieved successfully",
     *         @OA\JsonContent(type="object")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cart not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="cart not found.")
     *         )
     *     )
     * )
     */
    public static function getCart() {}

    /**
     * @OA\Delete(
     *     path="/api/cart",
     *     tags={"Shopping Cart"},
     *     summary="Remove an item from the shopping cart",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"product_id"},
     *             @OA\Property(property="product_id", type="integer", example=1, description="ID of the product to remove")
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Item deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation errors",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     )
     * )
     */
    public static function removeItemFromCart() {}
}

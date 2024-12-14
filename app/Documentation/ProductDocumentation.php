<?php

namespace App\Documentation;

use OpenApi\Annotations as OA;

/**
 * Class ShoppingCartDocumentation
 * @package App\Documentation
 */
class ProductDocumentation
{
    /**
     * @OA\Tag(
     *     name="Product",
     *     description="API endpoints for managing Product"
     * )
     */

    /**
     * @OA\Post(
     *     path="/api/products",
     *     tags={"Product"},
     *     summary="Add an item to the Product",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "price", "inventory"},
     *             @OA\Property(property="name", type="string", example="Sample Product"),
     *             @OA\Property(property="price", type="number", format="float", example=19.99),
     *             @OA\Property(property="inventory", type="integer", example=100)
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
    public static function addProduct() {}
}

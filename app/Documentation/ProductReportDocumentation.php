<?php

namespace App\Documentation;

use GuzzleHttp\Psr7\Request;
use OpenApi\Annotations as OA;

/**
 * Class ProductReportDocumentation
 * @package App\Documentation
 */
class ProductReportDocumentation
{
    /**
     * @OA\Tag(
     *     name="Product Report",
     *     description="API endpoints for retrieving product reports"
     * )
     */

    /**
     * @OA\Get(
     *     path="/api/product-reports",
     *     tags={"Product Report"},
     *     summary="Retrieve a list of product reports",
     *     description="Fetches product reports with optional filters for date range, user ID, and item name.",
     *     @OA\Parameter(
     *         name="start_date",
     *         in="query",
     *         required=false,
     *         description="The start date for filtering reports (format: YYYY-MM-DD)",
     *         @OA\Schema(type="string", format="date")
     *     ),
     *     @OA\Parameter(
     *         name="end_date",
     *         in="query",
     *         required=false,
     *         description="The end date for filtering reports (format: YYYY-MM-DD)",
     *         @OA\Schema(type="string", format="date")
     *     ),
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         required=false,
     *         description="Filter reports by user ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="item",
     *         in="query",
     *         required=false,
     *         description="Search for products by name",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful retrieval of product reports",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="price", type="number", format="float"),
     *                 @OA\Property(property="inventory", type="integer"),
     *                 @OA\Property(property="created_at", type="string", format="date-time"),
     *                 @OA\Property(property="user_id", type="integer")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request - Invalid parameters",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Invalid parameters provided.")
     *         )
     *     )
     * )
     */
    public function index(Request $request) {}
}

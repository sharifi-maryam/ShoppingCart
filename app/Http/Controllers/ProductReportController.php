<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class ProductReportController extends Controller
{
    public function index(Request $request)
    {
        $query = ShoppingCart::query();

        // Optional filters
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->has('item')) {
            $searchTerm = $request->item;

            $query->whereHas('product', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            });
        }

        $products = $query->get();

        return response()->json($products);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function filter(Request $request):JsonResponse
    {
        $selectedCategories = $request->input('categories');

        $objectsInCategory = Product::whereHas('categories', function ($query) use ($selectedCategories) {
            $query->whereIn('categories.id', $selectedCategories);
        })->get();
        return response()->json([
            'data' => $objectsInCategory,
            'message' => 'Form data received successfully'
        ]);
    }
}

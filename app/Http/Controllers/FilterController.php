<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter($categories)
    {

//        $filteredData = Category::whereIn('category', explode('-', $categories))->get();

        // Return the filtered data as JSON
        return response()->json(['filteredData' => 1]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{

    /**
     * Display list of categories for Back-End.
     *
     * @return Response
     */
    public function showBackendCategories()
    {
        $categories = Category::all();

        return view('back.categories')
            ->with('categories', $categories);
    }
}
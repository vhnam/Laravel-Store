<?php

namespace App\Http\Controllers;

use App\Models\Brand;

class BrandController extends Controller
{

    /**
     * Display list of brands for Back-End.
     *
     * @return Response
     */
    public function showBackendBrands()
    {
        $brands = Brand::all();

        return view('back.brands')
            ->with('brands', $brands);
    }
}
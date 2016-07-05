<?php

namespace App\Http\Controllers;

class BrandController extends Controller
{

    /**
     * Display list of brands for Back-End.
     *
     * @return Response
     */
    public function showBackendBrands()
    {
        return view('back.brands');
    }
}
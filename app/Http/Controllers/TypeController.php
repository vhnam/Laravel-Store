<?php

namespace App\Http\Controllers;

use App\Models\Type;

class TypeController extends Controller
{

    /**
     * Display list of types for Back-End.
     *
     * @return Response
     */
    public function showBackendTypes()
    {
        $types = Type::all();

        return view('back.types')
            ->with('types', $types);
    }
}
<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{

    /**
     * Display the home page.
     *
     * @return Response
     */
    public function index()
    {
        return view('front.index');
    }
}
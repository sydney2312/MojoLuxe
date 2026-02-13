<?php

namespace App\Http\Controllers;

class StyleLabController extends Controller
{
    /**
     * Style Lab main page.
     */
    public function index()
    {
        return view('stylelab.index', [
            'title' => 'Style Lab',
        ]);
    }
}

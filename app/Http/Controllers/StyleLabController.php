<?php

namespace App\Http\Controllers;

class WagClubController extends Controller
{
    /**
     * Wag Club rewards page.
     */
    public function index()
    {
        return view('wagclub.index', [
            'title' => 'Wag Club',
        ]);
    }
}

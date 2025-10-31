<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index($id)
    {
        // check if the user is authenticated and which group the user belongs to
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        $data = Product::singleProduct($id)->withPrices()->get()->first();

        return view('pages.default.detailspage', compact('data'));
    }
}

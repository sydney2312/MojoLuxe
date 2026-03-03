<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pet; // 👈 ADD THIS
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        // check user group
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        // fetch products
        $product_data = Product::withPrices()->get();

        // ✅ FETCH PETS FOR THIS USER
        $pets = Auth::check()
            ? Pet::where('user_id', Auth::id())->get()
            : collect();

        // ✅ PASS BOTH TO VIEW
        return view('pages.default.productspage',
            compact('product_data', 'pets')
        );
    }
}

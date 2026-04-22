<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PUBLIC PRODUCT PAGE
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        $product_data = Product::withPrices()->get();

        $pets = Auth::check()
            ? Pet::where('user_id', Auth::id())->get()
            : collect();

        return view('pages.default.productspage', compact('product_data', 'pets'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */
    public function adminDashboard()
    {
        $totalProducts = Product::count();
        $activeProducts = Product::where('status', 'active')->count();
        $inactiveProducts = Product::where('status', 'inactive')->count();
        $totalStock = Product::sum('quantity');
        $lowStock = Product::where('quantity', '<=', 5)->count();
        $averagePrice = Product::avg('price');
        $latestProducts = Product::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'activeProducts',
            'inactiveProducts',
            'totalStock',
            'lowStock',
            'averagePrice',
            'latestProducts'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN: PRODUCT LIST
    |--------------------------------------------------------------------------
    */
    public function indexAdmin()
    {
        $products = Product::withPrices()->get();

        return view('admin.products.index', compact('products'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN: CREATE FORM
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('admin.products.create');
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN: STORE PRODUCT
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = new Product();

        $product->title = $request->title;
        $product->short_description = $request->short_description ?? '';
        $product->full_description = $request->full_description ?? '';
        $product->price = $request->price;
        $product->quantity = $request->quantity ?? 0;
        $product->category = $request->category ?? 'uncategorized';
        $product->classification = $request->classification ?? 'default';
        $product->status = $request->status ?? 'active';

        // IMAGE HANDLING
        if ($request->file('image')) {
            $file = $request->file('image');

            $filename = time().'.'.$file->getClientOriginalExtension();

            $file->move(public_path('storage/images/products'), $filename);

            $product->image_path = 'storage/images/products/';
            $product->image_name = $filename;
        }

        $product->save();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully!');
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN: EDIT FORM
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN: UPDATE PRODUCT
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->title = $request->title;
        $product->short_description = $request->short_description ?? '';
        $product->full_description = $request->full_description ?? '';
        $product->price = $request->price ?? 0;
        $product->quantity = $request->quantity ?? 0;
        $product->category = $request->category ?? '';
        $product->classification = $request->classification ?? 'default';
        $product->status = $request->status ?? 'active';

        $product->save();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN: DELETE PRODUCT
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully!');
    }
}

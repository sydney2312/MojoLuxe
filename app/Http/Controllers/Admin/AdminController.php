<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DailyQuiz;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalProducts'    => Product::count(),
            'activeProducts'   => Product::where('status', 'active')->count(),
            'inactiveProducts' => Product::where('status', 'inactive')->count(),
            'lowStock'         => Product::where('quantity', '<=', 5)->count(),
            'totalStock'       => Product::sum('quantity'),
            'averagePrice'     => Product::avg('price') ?? 0,
            'totalUsers'       => User::count(),
            'totalQuiz'        => DailyQuiz::count(),
            'latestProducts'   => Product::latest()->take(8)->get(),
        ]);
    }
}

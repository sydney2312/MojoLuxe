<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DressUpController extends Controller
{
    // Wearable categories only — no toys or grooming
    private array $wearable = ['t-shirts', 'hoodies', 'dresses', 'bandanas', 'raincoats'];

    public function index()
    {
        $user = Auth::user()->load('pet');
        $pet = $user->pet;

        // Pull only wearable products, grouped by category
        $products = Product::whereIn('category', $this->wearable)
            ->where('status', 'active')
            ->get()
            ->groupBy('category');

        // Map breed to SVG key
        $breed = strtolower($pet->breed ?? '');
        $dog_svg = $this->mapBreed($breed);

        return view('pages.default.dressup', compact('pet', 'products', 'dog_svg'));
    }

    private function mapBreed(string $breed): string
    {
        if (str_contains($breed, 'poodle')) {
            return 'poodle';
        }
        if (str_contains($breed, 'golden') || str_contains($breed, 'retriever')) {
            return 'golden';
        }
        if (str_contains($breed, 'chihuahua')) {
            return 'chihuahua';
        }
        if (str_contains($breed, 'bulldog') || str_contains($breed, 'french')) {
            return 'bulldog';
        }
        if (str_contains($breed, 'husky') || str_contains($breed, 'malamute')) {
            return 'husky';
        }
        if (str_contains($breed, 'dachshund')) {
            return 'dachshund';
        }

        return 'golden'; // default
    }
}

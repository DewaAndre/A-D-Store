<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class CollectionController extends Controller
{
    // Constructor can be removed or customized based on requirements
    public function __construct()
    {
        // Add middleware if necessary
    }

    public function index(Request $request)
    {
        $categories = ['T-shirt', 'Long-Sleeve', 'Pants', 'Shoes'];  // Define categories
        $imagesByCategory = [];

        // Fetch images by category and paginate them
        foreach ($categories as $category) {
            $imagesByCategory[strtolower(str_replace(' ', '_', $category))] = Image::where('kategori', $category)
                ->paginate(10)
                ->appends($request->query());  // Preserve query parameters (like page and tab)
        }

        return view('collection', [
            'imagesByCategory' => $imagesByCategory,
        ]);
    }

}

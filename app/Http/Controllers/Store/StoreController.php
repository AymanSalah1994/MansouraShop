<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        // TODO : Changing this Main Page
        // Make a New Folder Outside Layouts and Exntend the Main Page
        $featured_products = Product::where('trending', '1')->take(5)->get();
        return view('store.home', compact('featured_products'));
    }

    public function categories()
    {
        $allCategories = Category::all();
        return view('store.categories', compact('allCategories'));
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
        public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function show(string $id): string
    {
        $product = Product::find($id);
        return "This is {$product->name} at the price of {$product->price}$";
    }
}

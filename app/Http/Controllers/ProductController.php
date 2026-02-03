<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
        public function index()
    {
        $product1 = new Product(1, "Laptop", 999.99);
        $product2 = new Product(2, "Smartphone", 499.49);
        $product3 = new Product(3, "Headphones", 149.99);
        $product4 = new Product(4,"Earbuds", 109.99);
        $product5 = new Product(5,"Smartwatch", 199.99);

        $data['products'] = [$product1, $product2, $product3, $product4, $product5];
        return view('products.index', $data);
    }
    public function show(string $id): string
    {
        return "Product details for product ID: {$id}";
    }
}

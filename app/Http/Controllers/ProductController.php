<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Scopes\ActiveScope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')
                             ->orderBy('name')
                             ->paginate(15);
        $inactiveProducts = Product::with('category')
                                    ->withoutGlobalScope(ActiveScope::class)
                                    ->where('active',0)
                                    ->orderBy('name')
                                    ->paginate(15);

        return view('products.index', compact('products','inactiveProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        $data = $request->validated();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }        
        $data['active'] = $request->boolean('active');

        try {
            Product::create($data);

            return redirect()
                ->route('products.index')
                ->with('success', 'Product created successfully.');
        } catch (\Throwable $e) {
            return back()
                ->withInput()
                ->with('error', 'Product creation failed.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return "This is {$product->name} at the price of {$product->price}$";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view("products.edit", compact("product","categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')->store('products', 'public');
        } else {
            unset($data['image']);
        }   

        $data['active'] = $request->boolean('active');

        // update product (slug handled automatically by your mutator)
        $product->update($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}

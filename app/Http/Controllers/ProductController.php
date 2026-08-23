<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $tenant = auth()->user()->tenant;
        $products = Product::where('tenant_id', $tenant->id)->get();

        return view('products.index', compact('products'));
    }

    // show the form for creating a product.

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $tenant = auth()->user()->tenant;

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sku' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'cost' => ['nullable', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
        ]);

        $tenant->products()->create($data);

        return redirect('/products')->with('success', 'Product added successfully!');
    }

    // show the form for editing a product.
    public function edit(Product $product)
    {
        if ($product->tenant_id !== auth()->user()->tenant_id){
        abort(403);
        }
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product){
        if($product->tenant_id !== auth()->user()->tenant_id){
            abort(403);
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sku' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'cost' => ['nullable', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
        ]);

        $product->update($data);

        return redirect('/products')->with('success', 'Product updated sucessfully!');
    }

    //Remove the product from the database.

    public function destroy(Product $product)
    {
        if($product->tenant_id !== auth()->user()->tenant_id){
            abort(403);
        }
        $product->delete();

        return redirect('/products')->with('success', 'Product deleted');
    }
}

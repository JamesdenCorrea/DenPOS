@extends('layouts.app')

@section('title', 'Products')
@section('page-title', 'Product Management')

@section('content')
    <div class="mb-4 flex justify-end">
        <a href="/products/create" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">+ Add Product</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">SKU</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Stock</th>
                    <th class="px-4 py-2 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $product->name }}</td>
                    <td class="px-4 py-2 text-gray-500">{{ $product->sku ?? 'N/A' }}</td>
                    <td class="px-4 py-2">₱{{ number_format($product->price, 2) }}</td>
                    <td class="px-4 py-2">{{ $product->stock }}</td>
                    <td class="px-4 py-2 text-right">
                        <a href="/products/{{ $product->id }}/edit" class="text-blue-500 hover:underline">Edit</a>
                        <form action="/products/{{ $product->id }}" method="POST" class="inline" onsubmit="return confirm('Delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                        No products yet. Click "Add Product" to start.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
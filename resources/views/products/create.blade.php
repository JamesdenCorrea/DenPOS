@extends('layouts.app')

@section('title', 'Add Product')
@section('page-title', 'Add New Product')

@section('content')
    <div class="max-w-md bg-white p-6 rounded-lg shadow">
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/products">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Product Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">SKU / Barcode</label>
                <input type="text" name="sku" value="{{ old('sku') }}" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Selling Price (₱)</label>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}" required class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Capital Cost (₱)</label>
                <input type="number" step="0.01" name="cost" value="{{ old('cost') }}" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Initial Stock</label>
                <input type="number" name="stock" value="{{ old('stock', 0) }}" required class="w-full px-3 py-2 border rounded-lg">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 rounded-lg hover:bg-blue-600">Save Product</button>
        </form>
    </div>
@endsection
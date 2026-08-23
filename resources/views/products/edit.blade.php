<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - DenPOS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Product</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/products/{{ $product->id }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}" required class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">SKU / Barcode</label>
                <input type="text" name="sku" value="{{ $product->sku }}" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Selling Price (₱)</label>
                <input type="number" step="0.01" name="price" value="{{ $product->price }}" required class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Capital Cost (₱)</label>
                <input type="number" step="0.01" name="cost" value="{{ $product->cost }}" class="w-full px-3 py-2 border rounded-lg">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Stock</label>
                <input type="number" name="stock" value="{{ $product->stock }}" required class="w-full px-3 py-2 border rounded-lg">
            </div>
            <button type="submit" class="w-full bg-green-500 text-white font-bold py-2 rounded-lg hover:bg-green-600">Update Product</button>
        </form>
    </div>
</body>
</html>
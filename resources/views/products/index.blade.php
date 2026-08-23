<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - DenPOS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Products</h1>
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
                    @foreach($products as $product)
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
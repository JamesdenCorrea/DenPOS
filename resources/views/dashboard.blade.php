<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DenPOS Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
       <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800">{{ $tenant->name }}</h1>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="text-sm text-red-500 hover:underline">Logout</button>
            </form>
        </div>
        <p class="text-sm text-gray-500 mb-4">{{ $tenant->industry_type }} | {{ $tenant->subscription_plan }} Plan</p>
        <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $tenant->name }}</h1>
        <p class="text-sm text-gray-500 mb-4">{{ $tenant->industry_type }} | {{ $tenant->subscription_plan }} Plan</p>

        <hr class="my-4">

        <h2 class="text-lg font-semibold text-gray-700 mb-2">Products</h2>
        <ul class="list-disc list-inside">
            @foreach($tenant->products as $product)
            <li>{{ $product->name }} - ₱{{ $product->price }}</li>
            @endforeach
        </ul>

        <hr class="my-4">

        <h2 class="text-lg font-semibold text-gray-700 mb-2">Modifiers</h2>
        <ul class="list-disc list-inside">
            @foreach($tenant->modifiers as $modifier)
            <li>{{ $modifier->name }} ({{ $modifier->type }})</li>
            @endforeach
        </ul>
    </div>
</body>

</html>
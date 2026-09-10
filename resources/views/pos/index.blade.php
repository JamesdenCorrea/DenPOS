@extends('layouts.app')

@section('title', 'POS')
@section('page-title', 'Point of Sale')

@section('content')
<div class="flex gap-6 h-full">

    {{-- LEFT: PRODUCT GRID --}}
    <div class="flex-1">
        <div class="mb-4 flex gap-2">
            <button class="px-4 py-2 bg-blue-500 text-white rounded-lg">All</button>
            <button class="px-4 py-2 bg-white text-gray-700 rounded-lg border">Drinks</button>
            <button class="px-4 py-2 bg-white text-gray-700 rounded-lg border">Food</button>
        </div>

        <div class="grid grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($products ?? [] as $product)
                <button class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition text-left">
                    <div class="font-bold text-gray-800">{{ $product->name }}</div>
                    <div class="text-sm text-gray-500">₱{{ number_format($product->price, 2) }}</div>
                    <div class="text-xs text-gray-400 mt-2">Stock: {{ $product->stock }}</div>
                </button>
            @endforeach

            {{-- Placeholder Cards (Remove later) --}}
            @for($i = 0; $i < 8; $i++)
                <div class="bg-white p-4 rounded-lg shadow opacity-40">
                    <div class="font-bold text-gray-300">Product</div>
                    <div class="text-sm text-gray-300">₱0.00</div>
                </div>
            @endfor
        </div>
    </div>

    {{-- RIGHT: CART --}}
    <div class="w-96 bg-white rounded-lg shadow flex flex-col">
        <div class="p-4 border-b">
            <h3 class="font-bold text-gray-800">Current Order</h3>
        </div>

        <div class="flex-1 p-4 overflow-y-auto">
            <div class="text-center text-gray-400 py-8">
                <p class="text-sm">No items yet.</p>
                <p class="text-xs mt-2">Click a product to add it here.</p>
            </div>
        </div>

        <div class="p-4 border-t bg-gray-50">
            <div class="flex justify-between mb-2 text-sm">
                <span class="text-gray-600">Subtotal</span>
                <span class="font-bold">₱0.00</span>
            </div>
            <div class="flex justify-between mb-4 text-sm">
                <span class="text-gray-600">VAT (12%)</span>
                <span class="font-bold">₱0.00</span>
            </div>
            <div class="flex justify-between mb-4 text-lg border-t pt-2">
                <span class="font-bold">TOTAL</span>
                <span class="font-bold text-green-600">₱0.00</span>
            </div>
            <button class="w-full bg-green-500 text-white font-bold py-3 rounded-lg hover:bg-green-600">
                Charge
            </button>
        </div>
    </div>

</div>
@endsection
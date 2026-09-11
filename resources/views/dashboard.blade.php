@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $tenant->name }}</h3>
        <p class="text-sm text-gray-500 mb-6">{{ ucfirst($tenant->industry_type) }} | {{ ucfirst($tenant->subscription_plan) }} Plan</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                <p class="text-sm text-blue-600">Total Products</p>
                <p class="text-2xl font-bold text-blue-800">{{ $tenant->products->count() }}</p>
            </div>
            <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                <p class="text-sm text-green-600">Total Modifiers</p>
                <p class="text-2xl font-bold text-green-800">{{ $tenant->modifiers->count() }}</p>
            </div>
            <div class="bg-purple-50 p-4 rounded-lg border border-purple-200">
                <p class="text-sm text-purple-600">Today's Sales</p>
                <p class="text-2xl font-bold text-purple-800">₱0.00</p>
            </div>
        </div>
    </div>
@endsection
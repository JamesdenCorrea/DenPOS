<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DenPOS') - @yield('page-title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex h-screen overflow-hidden">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-gray-900 text-white flex-shrink-0">
        <div class="p-4 border-b border-gray-700">
            <h1 class="text-xl font-bold">DenPOS</h1>
            <p class="text-xs text-gray-400">{{ auth()->user()->tenant->name ?? 'Super Admin' }}</p>
        </div>

        <nav class="p-4 space-y-2">
            {{-- Everyone sees POS --}}
            <a href="/pos" class="block px-4 py-2 rounded hover:bg-gray-700">🛒 POS</a>

            {{-- Owner and Manager see Products --}}
            @if(auth()->user()->isOwner() || auth()->user()->isManager())
                <a href="/products" class="block px-4 py-2 rounded hover:bg-gray-700">📦 Products</a>
            @endif

            {{-- Only Owner sees Staff and Reports --}}
            @if(auth()->user()->isOwner())
                <a href="/staff" class="block px-4 py-2 rounded hover:bg-gray-700">👥 Staff</a>
                <a href="/reports" class="block px-4 py-2 rounded hover:bg-gray-700">📊 Reports</a>
            @endif

            {{-- Super Admin sees Super Admin Panel --}}
            @if(auth()->user()->isSuperAdmin())
                <a href="/super-admin" class="block px-4 py-2 rounded hover:bg-gray-700">🔧 Admin Panel</a>
            @endif
        </nav>
    </aside>

    {{-- MAIN CONTENT AREA --}}
    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- TOP HEADER --}}
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h2>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600">
                    {{ auth()->user()->name }} ({{ ucfirst(str_replace('_', ' ', auth()->user()->role)) }})
                </span>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="text-sm text-red-500 hover:underline">Logout</button>
                </form>
            </div>
        </header>

        {{-- PAGE CONTENT --}}
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>
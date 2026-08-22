<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class DashboardController extends Controller
{
    public function index()
    {
        $tenant = Tenant::with('products', 'modifiers')->first();

        if (!$tenant) {
            return view('welcome');
        }

        return view('dashboard', compact('tenant'));
    }
}

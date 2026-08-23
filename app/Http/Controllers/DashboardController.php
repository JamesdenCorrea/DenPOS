<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // We grab the logged-in user's tenant
        $user = Auth::user();
        // If the user has no tenant, grab the first one for now

        if ($user && $user->tenant_id) {
            $tenant = Tenant::with('products', 'modifiers')->find($user->tenant_id);
        } else {
            $tenant = Tenant::with('products', 'modifiers')->first();
        }
        if (!$tenant) {
            return redirect('/register');
        }

        return view('dashboard', compact('tenant'));
    }
}

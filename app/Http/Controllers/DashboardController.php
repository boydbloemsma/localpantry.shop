<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $stores = Store::query()
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('dashboard', [
            'stores' => $stores
        ]);
    }
}

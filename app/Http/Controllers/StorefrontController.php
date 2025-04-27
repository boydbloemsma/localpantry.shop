<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StorefrontController extends Controller
{
    public function index($store)
    {
        $store = Store::where('slug', $store)->firstOrFail();
        $products = $store->products()->latest()->get();

        return view('storefront.index', compact('store', 'products'));
    }
}

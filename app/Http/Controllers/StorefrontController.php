<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class StorefrontController extends Controller
{
    public function index(Store $store)
    {
        $products = $store->products()->latest()->get();

        return view('storefront.index', [
            'store' => $store,
            'products' => $products,
        ]);
    }

    public function show(Store $store, Product $product)
    {
        return view('storefront.show', [
            'store' => $store,
            'product' => $product,
        ]);
    }
}

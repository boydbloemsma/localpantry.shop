<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class StorefrontController extends Controller
{
    public function index(Store $store)
    {
        $products = Product::query()
            ->where('store_id', $store->id)
            ->where('available', true)
            ->latest()
            ->get();

        return view('storefront.index', [
            'store' => $store,
            'products' => $products,
        ]);
    }

    public function show(Store $store, Product $product)
    {
        if (!$product->available) {
            abort(404);
        }

        return view('storefront.show', [
            'store' => $store,
            'product' => $product,
        ]);
    }
}

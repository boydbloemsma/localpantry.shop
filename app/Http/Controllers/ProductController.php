<?php

namespace App\Http\Controllers;

use App\Actions\CreateProductAction;
use App\Actions\UpdateProductAction;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Store $store)
    {
        return view('products.create', compact('store'));
    }

    public function store(Store $store, CreateProductRequest $request, CreateProductAction $action)
    {
        $action->handle(
            $request->validated(),
            $request->file('image'),
            $store,
        );

        return to_route('stores.show', $store);
    }

    public function edit(Store $store, Product $product)
    {
        return view('products.edit', compact('store', 'product'));
    }

    public function update(Store $store, Product $product, UpdateProductRequest $request, UpdateProductAction $action)
    {
        $action->handle(
            $request->validated(),
            $product,
            $request->file('image'),
        );

        return to_route('stores.show', $store);
    }
}

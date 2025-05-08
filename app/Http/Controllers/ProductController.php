<?php

namespace App\Http\Controllers;

use App\Actions\CreateProductAction;
use App\Actions\DeleteProductAction;
use App\Actions\UpdateProductAction;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function create(Store $store)
    {
        Gate::authorize('create', [Product::class, $store]);

        return view('products.create', [
            'store' => $store,
        ]);
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
        Gate::authorize('update', $product);

        return view('products.edit', [
            'store' => $store,
            'product' => $product,
        ]);
    }

    public function update(Store $store, Product $product, UpdateProductRequest $request, UpdateProductAction $action)
    {
        Gate::authorize('update', $product);

        $action->handle(
            $request->validated(),
            $product,
            $request->file('image'),
        );

        return to_route('stores.show', $store);
    }

    public function destroy(Store $store, Product $product, DeleteProductAction $action)
    {
        Gate::authorize('delete', $product);

        $action->handle($product);

        return to_route('stores.show', $store);
    }
}

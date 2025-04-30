<?php

namespace App\Http\Controllers;

use App\Actions\CreateProductAction;
use App\Http\Requests\CreateProductRequest;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Store $store)
    {
        return view('products.create', compact('store'));
    }

    public function store(CreateProductRequest $request, CreateProductAction $action)
    {
        $action->handle($request->user(), $request->validated(), $request->file('image'));

        return to_route('dashboard');
    }
}

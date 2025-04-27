<?php

namespace App\Http\Controllers;

use App\Actions\CreateProductAction;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('product.create');
    }

    public function store(CreateProductRequest $request, CreateProductAction $action)
    {
        $action->handle($request->user(), $request->validated());

        return to_route('dashboard');
    }
}

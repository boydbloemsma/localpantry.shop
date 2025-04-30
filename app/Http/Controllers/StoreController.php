<?php

namespace App\Http\Controllers;

use App\Actions\CreateStoreAction;
use App\Http\Requests\CreateStoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function show(Store $store)
    {
        return view('stores.show', compact('store'));
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store(CreateStoreRequest $request, CreateStoreAction $action)
    {
        $store = $action->handle($request->user(), $request->validated());

        return to_route('stores.show', $store);
    }
}

<?php

namespace App\Http\Controllers;

use App\Actions\CreateStoreAction;
use App\Http\Requests\CreateStoreRequest;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function create()
    {
        return view('store.create');
    }

    public function store(CreateStoreRequest $request, CreateStoreAction $action)
    {
        $action->handle($request->user(), $request->validated());

        return to_route('dashboard');
    }
}

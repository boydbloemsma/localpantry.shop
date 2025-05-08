<?php

namespace App\Http\Controllers;

use App\Actions\CreateProductAction;
use App\Actions\CreateStoreAction;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\CreateStoreRequest;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OnboardingController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->stores()->count() === 0) {
            return view('onboarding.store');
        }

        $store = $user->stores()->sole();

        if ($store->products()->count() === 0) {
            return view('onboarding.product', [
                'store' => $store,
            ]);
        }

        return to_route('dashboard');
    }

    public function createStore(CreateStoreRequest $request, CreateStoreAction $action)
    {
        $action->handle($request->user(), $request->validated());

        return back();
    }

    public function createProduct(Store $store, CreateProductRequest $request, CreateProductAction $action)
    {
        Gate::authorize('create', [Product::class, $store]);

        $action->handle(
            $request->validated(),
            $request->file('image'),
            $store,
        );

        $request->user()->update([
            'onboarded_at' => now(),
        ]);

        return to_route('stores.show', $store);
    }
}

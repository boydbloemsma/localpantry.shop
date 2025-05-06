<?php

namespace App\Http\Controllers;

use App\Actions\CreateContactMessageAction;
use App\Http\Requests\CreateContactMessageRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(CreateContactMessageRequest $request, CreateContactMessageAction $action)
    {
        $action->handle([
            ...$request->validated(),
            'ip_address' => $request->ip(),
        ]);

        return back()
            ->with('status', __('We have received your message. We will get back to you as soon as possible.'));
    }
}

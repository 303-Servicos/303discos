<?php

namespace App\Http\Controllers;

use App\Http\Requests\Label\CreateLabelRequest;
use App\Models\Label;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LabelController extends Controller
{
    public function index(): View
    {
        return view('labels.index', [
            'labels' => Label::paginate(),
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', Label::class);

        return view('labels.create');
    }

    public function store(CreateLabelRequest $request): RedirectResponse
    {
        $this->authorize('create', Label::class);

        Label::create($request->validated());

        return to_route('labels.index')->with('success', 'User created successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Label\{StoreLabelRequest, UpdateLabelRequest};
use App\Models\Label;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LabelController extends Controller
{
    public function index(): View
    {
        return view('labels.index', [
            'labels' => Label::orderBy('name')->paginate(),
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', Label::class);

        return view('labels.create');
    }

    public function store(StoreLabelRequest $request): RedirectResponse
    {
        $this->authorize('create', Label::class);

        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $file         = $request->file('logo');
            $filename     = $data['name'] . '.' . $file->getClientOriginalExtension();
            $data['logo'] = $file->storeAs('uploads/images/labels', $filename, 'public');
        }

        Label::create($data);

        return to_route('labels.index')->with('success', 'User created successfully.');
    }

    public function show(Label $label): View
    {
        return view('labels.show', compact('label'));
    }

    public function edit(Label $label): View
    {
        $this->authorize('update', $label);

        return view('labels.edit', compact('label'));
    }

    public function update(UpdateLabelRequest $request, Label $label): RedirectResponse
    {
        $this->authorize('update', $label);

        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $file         = $request->file('logo');
            $filename     = $data['name'] . '.' . $file->getClientOriginalExtension();
            $data['logo'] = $file->storeAs('uploads/images/labels', $filename, 'public');
        }

        $label->update($data);

        return to_route('labels.index')->with('success', 'User updated successfully.');
    }
}

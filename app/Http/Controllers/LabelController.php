<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Contracts\View\View;

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
}

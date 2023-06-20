<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class LabelController extends Controller
{
    public function index(): View
    {
        return view('labels.index');
    }

    public function create(): View
    {
        return view('labels.create');
    }
}

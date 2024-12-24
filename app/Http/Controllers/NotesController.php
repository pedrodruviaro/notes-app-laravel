<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NotesController extends Controller
{
    public function index(): View
    {
        return view('notes.index');
    }

    public function show(): View
    {
        return view('notes.show');
    }

    public function create(): View
    {
        return view('notes.create');
    }


    public function edit(): View
    {
        return view('notes.edit');
    }

    public function save(): void {}

    public function update(): void {}

    public function destroy(): void {}
}

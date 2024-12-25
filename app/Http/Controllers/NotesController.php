<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NotesController extends Controller
{
    public function index(): View
    {
        $userId = Auth::user()->id;
        $notes = Note::where('user_id', $userId)->whereNull('deleted_at')->latest()->paginate(5);

        return view('notes.index', ['notes' => $notes]);
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

<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NotesController extends Controller
{
    public function index(): View
    {

        $notes = Note::where('user_id', Auth::id())->whereNull('deleted_at')->latest()->paginate(5);

        return view('notes.index', ['notes' => $notes]);
    }

    public function show(Note $note): View
    {
        if ($note->user_id != Auth::id() || $note->deleted_at != null) {
            abort(404);
        }

        return view('notes.show', ['note' => $note]);
    }

    public function create(): View
    {
        return view('notes.create');
    }


    public function edit(Note $note): View
    {
        if ($note->user_id != Auth::id()) {
            abort(404);
        }

        return view('notes.edit', ['note' => $note]);
    }

    public function save(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'title' => ['required', 'min:3', 'max:255', 'string'],
            'content' => ['required', 'min:3', 'string'],
        ]);

        $note = new  Note($attributes);
        $note->user_id = Auth::id();
        $note->save();

        return redirect('/')->with('success', 'Note created successfully');
    }

    public function update(Request $request, Note $note): RedirectResponse
    {
        if ($note->user_id != Auth::id()) {
            abort(401);
        }

        $request->validate(
            [
                'title' => ['required', 'min:3', 'max:255', 'string'],
                'content' => ['required', 'min:3', 'string'],
            ]
        );

        $note->title = $request['title'];
        $note->content = $request['content'];
        $note->updated_at = Carbon::now();
        $note->save();

        return redirect("/note/$note->id")->with('success', 'Note updated successfully');
    }

    public function destroy(Note $note): RedirectResponse
    {
        $user_id = Auth::user()->id;

        if ($note->user_id != $user_id) {
            abort(401);
        }

        $note->delete();

        return redirect('/');
    }

    public function show_deleted(): View
    {
        $notes = Note::withTrashed()->where('user_id', Auth::id())->whereNotNull('deleted_at')->latest()->paginate(5);

        return view('notes.deleted', ['notes' => $notes])->with('success', 'Note deleted successfully');
    }

    public function restore(string $id): RedirectResponse
    {

        $note = Note::withTrashed()->where('id', $id)->where('user_id', Auth::id())->first();

        if (!$note) {
            abort(404);
        }

        $note->restore();

        return redirect("/note/{$note->id}")->with('success', 'Note restored successfully');
    }
}

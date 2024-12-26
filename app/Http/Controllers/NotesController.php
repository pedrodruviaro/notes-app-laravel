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
        $userId = Auth::user()->id;
        $notes = Note::where('user_id', $userId)->whereNull('deleted_at')->latest()->paginate(5);

        return view('notes.index', ['notes' => $notes]);
    }

    public function show(Note $note): View
    {
        $user_id = Auth::user()->id;

        if ($note->user_id != $user_id || $note->deleted_at != null) {
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
        $user_id = Auth::user()->id;

        if ($note->user_id != $user_id) {
            abort(404);
        }

        return view('notes.edit', ['note' => $note]);
    }

    public function save(): void {}

    public function update(Request $request, Note $note): RedirectResponse
    {

        $user_id = Auth::user()->id;

        if ($note->user_id != $user_id) {
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

        return redirect("/note/$note->id");
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
}

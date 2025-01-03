<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::where('user_id', Auth::id())->latest()->get();

        return view('tags.index', ['tags' => $tags]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:tags,slug'],
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->user_id = Auth::id();
        $tag->save();

        return redirect()->route('tags');
    }

    public function show(Tag $tag)
    {
        $notes = Note::where('user_id', Auth::id())->whereHas('tags', function ($query) use ($tag) {
            $query->where('tags.id', $tag->id);
        })->latest()->get();

        return view('tags.show', ['notes' => $notes, 'tag' => $tag]);
    }
}

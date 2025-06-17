<?php

namespace App\Http\Controllers;

use App\Models\Note;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Note::all()->where('user_id', Auth::id());

        return view('notes.index', ['notes' => $notes]);
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5|max:50',
            'content' => 'required|min:10'
        ]);

        Note::create([
            ...$validated,
            'user_id' => Auth::id()
        ]);

        return redirect('notes')->with('success', 'Note save with success');
    }

    public function show(Note $note)
    {
        return view('/notes.note', ['note' => $note]);
    }

    public function destroy(Request $request)
    {
        $note_id = $request->note_id;

        Note::destroy($note_id);

        $notes = Note::all();

        return view('/notes/show', ['notes' => $notes]);
    }
}

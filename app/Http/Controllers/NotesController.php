<?php

namespace App\Http\Controllers;

use App\Models\Note;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', Auth::id())->get();

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
            'content' => 'required'
        ]);

        Note::create([
            ...$validated,
            'user_id' => Auth::id()
        ]);

        $notes = Note::where('user_id', Auth::id())->get();

        return view('notes.index', ['notes' => $notes]);
    }

    public function show(Note $note)
    {
        return view('/notes.show', ['note' => $note]);
    }

    public function destroy(Note $note)
    {
        if ($note->user_id === Auth::id()) {
            $note->delete();
        }

        return redirect('/notes');
    }
}

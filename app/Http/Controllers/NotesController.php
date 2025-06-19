<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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

    public function CheckAuthorizationUpdate(User $user,Note $note)
    {
        if(! Gate::allows('update-note', $note)) {
            abort(403);
        }

        return view('update', ['note' => $note]);
    }

    public function saveUpdate(Request $request, Note $note)
    {
       $validated = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $note->update($validated);

        return redirect('notes');
        
    }
}

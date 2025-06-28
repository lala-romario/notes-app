<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpKernel\Exception\HttpException;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Note::class, 'note');
    }

    public function index(Request $request)
    {

        return view('notes.index', ['notes' => $request->user()->notes]);
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

        //$notes = Note::where('user_id', Auth::id())->get();

        return redirect('notes');
    }

    public function show(Note $note)
    {
        return view('/notes.show', ['note' => $note]);
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect(route('notes.index'));
    }

    public function edit(Note $note)
    {
        return view('notes.update', ['note' => $note]);
    }

    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $note->update($validated);

        return redirect('notes');
    }
}

<?php
namespace App\Http\Controllers;

use App\Models\Note;

class DashboardController extends Controller
{
    public function index()
    {
        $notes = Note::with('user')->get();

        return view('notes.dashboard', [
            'notes' => $notes,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Note;
use App\Services\Operations;

class MainController extends Controller
{
  public function index()
  {
    $id = session('user.id');
    $notes = User::find($id)->notes()->get()->toArray();

    return view('home', ['notes' => $notes]);
  }

  public function newNote()
  {
    return view('new-note');
  }

  public function newNoteSubmit(Request $request)
  {
    $request->validate(
      [
        'text_title' => 'required|min:3|max:200',
        'text_note' => 'required|min:3|max:3000'
      ],
      [
        'text_title.required' => 'O campo título é obrigatório.',
        'text_title.min' => 'O campo título deve ter pelo menos :min caracteres.',
        'text_title.max' => 'O campo título deve ter no máximo :max caracteres.',
        'text_note.required' => 'O campo texto é obrigatório.',
        'text_note.min' => 'O campo texto deve ter pelo menos :min caracteres.',
        'text_note.max' => 'O campo texto deve ter no máximo :max caracteres.',
      ]
    );

    $id = session('user.id');

    $note = new Note();
    $note->user_id = $id;
    $note->title = $request->text_title;
    $note->text = $request->text_note;
    $note->save();

    return redirect()->route('home');
  }

  public function editNote($id)
  {
    $id = Operations::decryptID($id);

    $note = Note::find($id);

    return view('edit-note', ['note' => $note]);
  }

  public function deleteNote($id)
  {
    $id = Operations::decryptID($id);

    echo 'id: ' . $id;
  }
}

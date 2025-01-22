<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\User;
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
    echo 'Creating new note';
  }

  public function editNote($id)
  {
    $id = Operations::decryptID($id);

    echo 'id: ' . $id;
  }

  public function deleteNote($id)
  {
    $id = Operations::decryptID($id);

    echo 'id: ' . $id;
  }
}

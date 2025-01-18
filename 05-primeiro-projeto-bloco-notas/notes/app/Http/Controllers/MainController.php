<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;

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
    echo 'main:newNote';
  }

  public function editNote($id)
  {
    try {
      $id = Crypt::decrypt($id);
    } catch (DecryptException $e) {
      return redirect()->route('home');
    }
  }

  public function deleteNote($id)
  {
    try {
      $id = Crypt::decrypt($id);
    } catch (DecryptException $e) {
      return redirect()->route('home');
    }
  }
}

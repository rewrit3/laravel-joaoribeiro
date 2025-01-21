<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\User;

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
    $id = $this->decryptID($id);

    echo $id;
  }

  public function deleteNote($id)
  {
    $id = $this->decryptID($id);

    echo $id;
  }

  private function decryptID($id)
  {
    try {
      $id = Crypt::decrypt($id);
    } catch (DecryptException $e) {
      return redirect()->route('home');
    }

    return $id;
  }
}

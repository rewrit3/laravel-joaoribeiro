<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MainController extends Controller
{
  public function index()
  {
    $id = session('user.id');
    $user = User::find($id)->toArray();
    $notes = User::find($id)->notes()->get()->toArray();

    echo "<pre>";
    var_dump($user);
    var_dump($notes);
    exit;

    return view('home');
  }

  public function newNote()
  {
    echo 'main:newNote';
  }
}

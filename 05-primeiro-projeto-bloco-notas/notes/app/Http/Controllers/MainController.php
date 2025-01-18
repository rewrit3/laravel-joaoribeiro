<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
  public function index()
  {
    echo 'main:index';
  }

  public function newNote()
  {
    echo 'main:newNote';
  }
}

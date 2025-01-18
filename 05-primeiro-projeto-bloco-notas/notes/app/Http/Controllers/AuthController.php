<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{
  public function login()
  {
    return view('login');
  }

  public function loginSubmit(Request $request)
  {
    $request->validate(
      [
        'text_username' => 'required|email',
        'text_password' => 'required|min:6|max:16'
      ],
      [
        'text_username.required' => 'O campo usuário é obrigatório.',
        'text_username.email' => 'O campo usuário deve ser um email válido.',
        'text_password.required' => 'O campo senha é obrigatório.',
        'text_password.min' => 'O campo senha deve ter pelo menos :min caracteres.',
        'text_password.max' => 'O campo senha deve ter no máximo :max caracteres.',
      ]
    );

    $username = $request->input('text_username');
    $password = $request->input('text_password');

    // $users = User::all()->toArray();
    $userModel = new User();
    $users = $userModel->all()->toArray();

    echo '<pre>';
    print_r($users);
    echo '</pre>';
  }

  public function logout()
  {
    return view('logout');
  }
}

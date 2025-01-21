<?php

namespace App\Services;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Operations
{
  public static function decryptID($value)
  {
    try {
      $value = Crypt::decrypt($value);
    } catch (DecryptException $e) {
      return redirect()->route('home');
    }

    return $value;
  }
}

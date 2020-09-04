<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserRegistrationController extends Controller
{

  public function create(Request $request)
  {
    return view('/user_regist/create');
  }

  public function store(Request $request)
  {
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->back();
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRegistrationController extends Controller
{

  private function validator(array $data)
  {
      return Validator::make($data, [
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', Rule::unique('mysql_two.users', 'email')->whereNull('deleted_at'),],
          'role' => ['required'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);
  }

  public function index()
  {
      $items=User::orderBy('role')->paginate(20);
      $trashItems=User::onlyTrashed()->orderBy('role')->paginate(20);

      return view('/user_regist/index',compact('items','trashItems'));
  }

  public function create(Request $request)
  {
    return view('/user_regist/create');
  }

  public function store(Request $request)
  {
    $validator = $this->validator($request->all());
    if($validator->fails()){
      return redirect()
                ->route('user.regist')
                ->withErrors($validator)
                ->withInput();
    }

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('user.index');
  }

  public function edit($id)
  {

  }

  public function update($id)
  {

  }

  public function destroy($id)
  {

  }

  public function restore($id)
  {

  }

  public function forceDelete($id)
  {

  }
}

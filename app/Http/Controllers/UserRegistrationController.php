<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

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

  private function update_validator(array $data)
  {
      return Validator::make($data, [
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255'],
          'role' => ['required'],
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
    $item = User::find($id);

    return view('/user_regist/edit',compact('item'));
  }

  public function update(Request $request,$id)
  {
    $validator = $this->update_validator($request->all());
    if($validator->fails()){
      return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
    }

    $item = User::where('id',$id)->first();
    $item->name = $request->name;
    $item->email = $request->email;
    $item->role = $request->role;
    $item->save();

    return redirect()->route('user.index');
  }

  public function destroy($id)
  {
    User::find($id)->delete();
    return redirect()->back();
  }

  public function restore($id)
  {
    User::withTrashed()->find($id)->restore();
    return redirect()->route('user.index');
  }

  public function forceDelete($id)
  {
    User::withTrashed()->find($id)->forceDelete();
    return redirect()->route('user.index');
  }

  public function password_reset($id)
  {
    $item = User::where('id',$id)->first();
    $item->password = Hash::make('faith123');
    $item->save();

    return redirect()->route('user.index');
  }
}

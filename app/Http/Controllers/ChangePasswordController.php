<?php

/**
 *  パスワードの変更を実施する
 *
 *
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  // private function validator(array $data)
  // {
  //   return Validator::make($data, [
  //     'current_password' => ['required'],
  //     'password' => ['required', new AlphaNumHalf, 'min:8', 'confirmed'],
  //   ]);
  // }

  private $messages = [
    'current_password.required' => '※現在のパスワードの入力は必須です。',
    'password.regix' => '※8文字以上の半角英数字で入力してください。'
  ];
  private $rules = [
    'current_password' => 'required|max:100',
    'password' => 'required|string|min:8|max:100|regex:/^(?=.*?[a-z])(?=.*?\d)[a-z\d]+$/i',
  ];

  public function index()
  {
      return view('change_password.index');
  }

  public function changePassword(Request $request)
  {
      //現在のパスワードが正しいかを調べる
      if(!(Hash::check($request->get('current_password'), Auth::user()->password))) {
          return redirect()->back()->with('change_password_error', '現在のパスワードが間違っています。');
      }

      //現在のパスワードと新しいパスワードが違っているかを調べる
      if(strcmp($request->get('current_password'), $request->get('password')) == 0) {
          return redirect()->back()->with('change_password_error', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
      }

      //パスワードのバリデーション。新しいパスワードは8文字以上、new-password_confirmationフィールドの値と一致しているかどうか。
      $validator = Validator::make($request->all(),$this->rules,$this->messages);

      if($validator->fails()){
        return redirect()
                  ->back()
                  ->withErrors($validator)
                  ->withInput();
      }

       //パスワード変更処理
       $user = Auth::user();
       $user->password = bcrypt($request->get('password'));
       $user->save();

       // パスワード変更処理後、homeにリダイレクト
       return redirect()->route('top');
   }
}

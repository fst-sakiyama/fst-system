<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangeNameRequest;
use App\Http\Requests\ChangeEmailRequest;

class SettingController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $auth = Auth::user();
      return view('setting\index', ['auth' => $auth]);
    }

    public function showChangeNameForm()
    {
       $auth = Auth::user();
       return view('setting\name', ['auth' => $auth]);
    }

    public function changeName(ChangeNameRequest $request)
    {
     //ValidationはChangeNameRequestで処理
     //氏名変更処理
     $user = Auth::user();
     $user->name = $request->get('name');
     $user->save();
     //homeにリダイレクト
     return redirect()->route('setting')->with('status', __('Your name has been changed.'));
    }

    public function showChangeEmailForm()
    {
       $auth = Auth::user();
       return view('setting\email', ['auth' => $auth]);
    }

    public function changeEmail(ChangeEmailRequest $request)
    {
     //ValidationはChangeUsernameRequestで処理
     //メールアドレス変更処理
     $user = Auth::user();
     $user->email = $request->get('email');
     $user->save();

     //homeにリダイレクト
     return redirect()->route('setting')->with('status', __('Your email address has been changed.'));
    }
}

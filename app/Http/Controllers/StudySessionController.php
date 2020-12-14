<?php

namespace App\Http\Controllers;

use App\Models\StudySession;
use Illuminate\Http\Request;

class StudySessionController extends Controller
{
    public function index()
    {
        return view('study_session.index');
    }

    public function test01()
    {
        $items = StudySession::all();

        return view('study_session.test01',compact('items'));
    }

    public function test02()
    {
        return view('study_session.test02');
    }
}

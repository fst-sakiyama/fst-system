@extends('layouts.system_top')

@section('title','引継ぎ')

@include('components.common.head')

@include('components.common.header')

@include('components.take_over.take_over_index',['dispDate'=>$dispDate,'takeOvers'=>$takeOvers,'takeOversTimeLimit'=>$takeOversTimeLimit,'takeOversTrashToday'=>$takeOversTrashToday,'wellKnowns'=>$wellKnowns,'takeOversTrash'=>$takeOversTrash,'wellKnownsTrash'=>$wellKnownsTrash])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_cookie.js')}}"></script>
@endsection

@include('components.common.footer')

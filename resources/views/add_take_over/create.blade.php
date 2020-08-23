@extends('layouts.system_top')

@section('title','【追記】引き継ぎ | 新規作成')

@include('components.common.head')

@include('components.common.header')

@include('components.add_take_over.add_take_over_create',['dispDate'=>$dispDate,'takeOverTheOperation'=>$takeOverTheOperation])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_fileinput.js')}}"></script>
@endsection

@include('components.common.footer')

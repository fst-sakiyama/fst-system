@extends('layouts.system_top')

@section('title','パスワード変更')

@include('components.common.head')

@include('components.common.header')

@include('components.change_password.change_password_index')

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

@extends('layouts.system_top')

@section('title','ユーザー名変更')

@include('components.common.head')

@include('components.common.header')

@include('components.setting.setting_name')

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

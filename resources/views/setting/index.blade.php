@extends('layouts.system_top')

@section('title','ユーザー詳細情報')

@include('components.common.head')

@include('components.common.header')

@include('components.setting.setting_index')

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

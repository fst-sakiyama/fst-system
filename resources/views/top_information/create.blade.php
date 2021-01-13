@extends('layouts.system_top')

@section('title','インフォメーション新規')

@include('components.common.head')

@include('components.common.header')

@include('components.top_information.information_create')

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_replyOpen.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_fileinput.js')}}"></script>
@endsection

@include('components.common.footer')

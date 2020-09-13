@extends('layouts.system_top')

@section('title','カレンダーテスト')

@include('components.common.head')

@include('components.common.header')

@include('components.calendar.take_over_view')

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

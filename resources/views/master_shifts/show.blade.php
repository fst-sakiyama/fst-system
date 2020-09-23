@extends('layouts.system_top')

@section('title','登録されているシフト詳細')

@include('components.common.head')

@include('components.common.header')

@include('components.master_shifts.master_shifts_show',['item'=>$masterShift])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

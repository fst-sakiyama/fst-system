@extends('layouts.system_top')

@section('title','有給取得確認')

@section('pageCss')
<link rel="stylesheet" href="{{asset('/css/paid-leave.css')}}">
@endsection

@include('components.common.head_livewire')

@include('components.common.header')

@include('components.paid_leave.paid_leave_index',['items'=>$items,'paidLeave'=>$paidLeave])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_linkTable.js')}}"></script>
@endsection

@include('components.common.footer_livewire')

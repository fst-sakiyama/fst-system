@extends('layouts.system_top')

@section('title','ダミーページ')

@include('components.common.head')

@include('components.common.header')

@include('components.dummy.dummy_index',['disp'=>$disp,'dates'=>$dates,'cnt'=>$cnt,'calendar'=>$calendar,'holidays'=>$holidays])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

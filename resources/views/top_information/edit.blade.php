@extends('layouts.system_top')

@section('title','インフォメーション修正')

@include('components.common.head')

@include('components.common.header')

@include('components.top_information.information_edit',['item'=>$item])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_replyOpen.js')}}"></script>
@endsection

@include('components.common.footer')

@extends('layouts.system_top')

@section('title','検索結果')

@include('components.common.head')

@include('components.common.header')

@include('components.take_over.search_result',['items'=>$items])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_cookie.js')}}"></script>
@endsection

@include('components.common.footer')

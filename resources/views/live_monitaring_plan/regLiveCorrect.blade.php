@extends('layouts.system_top')

@section('title','ライブ情報修正')

@section('pageCss')
<link rel="stylesheet" href="{{asset('/css/live-monitor.css')}}">
@endsection

@include('components.common.head')

@include('components.common.header')

@include('components.live_monitaring_plan.live_monitaring_plan_regLiveCorrect',['regId'=>$regId])

@section('pageJs')
<!-- <script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_liveIndex.js')}}"></script> -->
@endsection

@include('components.common.footer')

@extends('layouts.system_top')

@section('title','ライブ予定登録')

@include('components.common.head')

@include('components.common.header')

@include('components.live_monitaring_plan.live_monitaring_plan_liveCreate')

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_liveCreate.js')}}"></script>
@endsection

@include('components.common.footer')

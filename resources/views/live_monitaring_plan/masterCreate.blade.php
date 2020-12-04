@extends('layouts.system_top')

@section('title','定例ライブマスタ新規作成')

@include('components.common.head')

@include('components.common.header')

@include('components.live_monitaring_plan.live_monitaring_plan_masterCreate',['items'=>$items])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

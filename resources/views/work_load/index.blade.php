@extends('layouts.system_top')

@section('title','工数表')

@section('pageCss')
<link rel="stylesheet" href="{{asset('/css/work-load.css')}}">
@endsection

@include('components.common.head_livewire')

@include('components.common.header')

@include('components.work_load.work_load_index',['status'=>$status,'dates'=>$dates,'holidays'=>$holidays,'calendar'=>$calendar,'firstDay'=>$firstDay,'workLoads'=>$workLoads,'teamProjects'=>$teamProjects,'userId'=>$userId])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_workLoad.js')}}"></script>
@endsection

@include('components.common.footer_livewire')

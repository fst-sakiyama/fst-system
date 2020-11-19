@extends('layouts.system_top')

@section('title','工数表')

@include('components.common.head_livewire')

@include('components.common.header')

@include('components.work_load.work_load_index',['dates'=>$dates,'holidays'=>$holidays,'calendar'=>$calendar,'firstDay'=>$firstDay,'workLoads'=>$workLoads,'teamProjects'=>$teamProjects])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer_livewire')

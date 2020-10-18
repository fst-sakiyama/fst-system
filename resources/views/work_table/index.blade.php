@extends('layouts.system_top')

@section('title','勤務表')

@include('components.common.head')

@include('components.common.header')

@include('components.work_table.work_table_index',['status'=>$status,'dates'=>$dates,'items'=>$items,'holidays'=>$holidays,'calendar'=>$calendar,'firstDay'=>$firstDay])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')
@extends('layouts.system_top')

@section('title','シフト表')

@include('components.common.head')

@include('components.common.header')

@include('components.shift_table.shift_table_index',['dates'=>$dates,'items'=>$items,'holidays'=>$holidays,'calendar'=>$calendar,'firstDay'=>$firstDay])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

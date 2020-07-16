@extends('layouts.system_top')

@section('title','引継ぎ')

@include('components.common.head')

@include('components.common.header')

@include('components.take_over.take_over_index',['items'=>$items,'dispDate'=>$dispDate])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

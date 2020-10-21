@extends('layouts.system_top')

@section('title','トップページ')

@include('components.common.head')

@include('components.common.header')

@include('components.system_top.system_top_index',['progressDetailes'=>$progressDetails,'fstSystemInformation'=>$fstSystemInformation])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

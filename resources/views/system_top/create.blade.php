@extends('layouts.system_top')

@section('title','要望板')

@include('components.common.head')

@include('components.common.header')

@include('components.system_top.system_top_create',['requestClassifications'=>$requestClassifications,'masterRequestClassifications'=>$masterRequestClassifications,'items'=>$items])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_replyOpen.js')}}"></script>
@endsection

@include('components.common.footer')

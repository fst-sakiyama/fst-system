@extends('layouts.system_top')

@section('title','【追記】引き継ぎ | 修正')

@include('components.common.head')

@include('components.common.header')

@include('components.add_take_over.add_take_over_edit',['dispDate'=>$dispDate,'addId'=>$addId,'takeOverTheOperation'=>$takeOverTheOperation])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_fileinput.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_filedel.js')}}"></script>
@endsection

@include('components.common.footer')

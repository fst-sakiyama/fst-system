@extends('layouts.system_top')

@section('title','引き継ぎ | 新規作成')

@include('components.common.head')

@include('components.common.header')

@include('components.take_over.take_over_create',['masterClients'=>$masterClients,'masterProjects'=>$masterProjects])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

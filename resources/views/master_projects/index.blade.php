@extends('layouts.system_top')

@section('title','案件一覧')

@include('components.common.head')

@include('components.common.header')

@include('components.master_projects.master_projects_index',['contractTypes'=>$contractTypes,'items'=>$items])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_cookie.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_linkTable.js')}}"></script>
@endsection

@include('components.common.footer')

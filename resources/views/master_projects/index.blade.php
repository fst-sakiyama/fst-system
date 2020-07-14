@extends('layouts.system_top')

@section('title','案件一覧')

@include('components.common.head')

@include('components.common.header')

@include('components.master_projects.master_projects_index',['items'=>$items])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

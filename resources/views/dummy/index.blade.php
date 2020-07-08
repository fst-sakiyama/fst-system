@extends('layouts.system_top')

@section('title','ダミーページ')

@include('components.common.head')

@include('components.common.header')

@include('components.dummy.dummy_index',['masterProjects'=>$masterProjects,'masterClients'=>$masterClients,'dates'=>$dates])

@section('pageJs')
<script type="text/javascript" src="js/add_jquery.js"></script>
@endsection

@include('components.common.footer')

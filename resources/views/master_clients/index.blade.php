@extends('layouts.system_top')

@section('title','顧客一覧')

@include('components.common.head')

@include('components.common.header')

@include('components.master_clients.master_clients_index',['items'=>$items])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_linkTable.js')}}"></script>
@endsection

@include('components.common.footer')

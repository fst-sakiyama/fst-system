@extends('layouts.system_top')

@section('title',$clientName->clientName)

@include('components.common.head')

@include('components.common.header')

@include('components.clients_detail.clients_detail_index',['clientId'=>$clientId,'clientName'=>$clientName,'items'=>$items])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

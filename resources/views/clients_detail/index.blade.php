@extends('layouts.system_top')

@section('title',$clientName->clientName)

@include('components.common.head')

@include('components.common.header')

@include('components.clients_detail.clients_detail_index',['clientName'=>$clientName,'items'=>$items])

@section('pageJs')
<script type="text/javascript" src="js/add_jquery.js"></script>
@endsection

@include('components.common.footer')

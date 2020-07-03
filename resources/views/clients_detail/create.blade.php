@extends('layouts.system_top')

@section('title','案件一覧 | 新規作成')

@include('components.common.head')

@include('components.common.header')

@include('components.clients_detail.clients_detail_create',['clientId'=>$clientId,'masterContractTypes'=>$masterContractTypes])

@section('pageJs')
<script type="text/javascript" src="js/add_jquery.js"></script>
@endsection

@include('components.common.footer')

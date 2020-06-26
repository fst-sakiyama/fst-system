@extends('layouts.system_top')

@section('title','顧客一覧 | 顧客詳細')

@include('components.common.head')

@include('components.common.header')

@include('components.master_clients.master_clients_edit',['item'=>$item])

@section('pageJs')
<script type="text/javascript" src="js/add_jquery.js"></script>
@endsection

@include('components.common.footer')

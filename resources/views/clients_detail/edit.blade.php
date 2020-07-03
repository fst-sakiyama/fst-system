@extends('layouts.system_top')

@section('title','案件一覧 | 案件情報修正')

@include('components.common.head')

@include('components.common.header')

@include('components.clients_detail.clients_detail_edit',['item'=>$item,'masterContractTypes'=>$masterContractTypes])

@section('pageJs')
<script type="text/javascript" src="js/add_jquery.js"></script>
@endsection

@include('components.common.footer')

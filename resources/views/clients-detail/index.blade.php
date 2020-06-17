@extends('layouts.system-top')

@section('title','トップページ')

@include('components.common.head')

@include('components.common.header')

@include('components.clients-detail.clients-detail-index',['clientName'=>$clientName,'items'=>$items])

@section('pageJs')
<script type="text/javascript" src="js/add_jquery.js"></script>
@endsection

@include('components.common.footer')

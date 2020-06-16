@extends('layouts.system-top')

@section('title','トップページ')

@include('components.common.head')

@include('components.common.header')

@include('components.clients-detail.clients-detail-index',['items'=>$items])

@section('pageJs')
<script type="text/javascript" src="js/add_jquery.js"></script>
<script type="text/javascript" src="js/caution_jquery.js"></script>
<script type="text/javascript" src="js/click_func.js"></script>
@endsection

@include('components.common.footer')

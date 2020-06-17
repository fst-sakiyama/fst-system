@extends('layouts.system-top')

@section('title','トップページ')

@include('components.common.head')

@include('components.common.header')

@include('components.system-top.system-top-index')

@section('pageJs')
<script type="text/javascript" src="js/add_jquery.js"></script>
@endsection

@include('components.common.footer')

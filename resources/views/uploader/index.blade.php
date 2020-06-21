@extends('layouts.system_top')

@section('title','トップページ')

@include('components.common.head')

@include('components.common.header')

@include('components.uploader.upload_index')

@section('pageJs')
<script type="text/javascript" src="js/add_jquery.js"></script>
@endsection

@include('components.common.footer')

@extends('layouts.system_top')

@section('title','課題 | 新規作成')

@include('components.common.head')

@include('components.common.header')

@include('components.dev_confirm.dev_confirm_add')

@section('pageJs')
<script type="text/javascript" src="js/add_jquery.js"></script>
@endsection

@include('components.common.footer')

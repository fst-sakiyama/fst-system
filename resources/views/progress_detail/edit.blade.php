@extends('layouts.system_top')

@section('title','課題詳細修正')

@include('components.common.head')

@include('components.common.header')

@include('components.progress_detail.progress_detail_edit',['item'=>$item])

@section('pageJs')
<script type="text/javascript" src="js/add_jquery.js"></script>
@endsection

@include('components.common.footer')

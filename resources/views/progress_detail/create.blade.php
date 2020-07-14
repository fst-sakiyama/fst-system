@extends('layouts.system_top')

@section('title','課題詳細作成')

@include('components.common.head')

@include('components.common.header')

@include('components.progress_detail.progress_detail_create',['fstSystemProgressId'=>$fstSystemProgressId])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

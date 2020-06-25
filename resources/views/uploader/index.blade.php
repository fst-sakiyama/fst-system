@extends('layouts.system_top')

@section('title','ファイルアップロード')

@include('components.common.head')

@include('components.common.header')

@include('components.uploader.upload_index',['masterFileClassifications'=>$masterFileClassifications,'MasterProject'=>$masterProject])

@section('pageJs')
<script type="text/javascript" src="js/add_jquery.js"></script>
@endsection

@include('components.common.footer')

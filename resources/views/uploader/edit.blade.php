@extends('layouts.system_top')

@section('title','ファイル | ファイル情報修正')

@include('components.common.head')

@include('components.common.header')

@include('components.uploader.upload_edit',['item'=>$item,'masterFileClassifications'=>$masterFileClassifications])

@section('pageJs')
<script type="text/javascript" src="js/add_jquery.js"></script>
@endsection

@include('components.common.footer')

@extends('layouts.system_top')

@section('title','削除済みアイテムの管理')

@include('components.common.head')

@include('components.common.header')

@include('components.dev_deleted_items.dev_deleted_items_index',['filePosts'=>$filePosts])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

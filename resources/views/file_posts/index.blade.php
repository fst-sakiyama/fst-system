@extends('layouts.system_top')

@section('title',$clientProject->projectName)

@include('components.common.head')

@include('components.common.header')

@include('components.file_posts.file_posts_index',['clientProject'=>$clientProject,'items'=>$items])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

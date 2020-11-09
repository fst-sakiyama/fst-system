@extends('layouts.system_top')

@section('title',$masterProject->projectName)

@include('components.common.head')

@include('components.common.header')

@include('components.file_posts.file_posts_index',['masterFileClassification'=>$masterFileClassification,'projectsFileClassification'=>$projectsFileClassification,'masterProject'=>$masterProject,'projectsFileClassifications'=>$projectsFileClassifications,'projectsFilePosts'=>$projectsFilePosts,'cnt'=>$cnt,'teamProjects'=>$teamProjects,'items'=>$items])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_cookie.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_slideShow.js')}}"></script>
@endsection

@include('components.common.footer')

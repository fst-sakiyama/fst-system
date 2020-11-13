@extends('layouts.system_top')

@section('title',$masterProject->projectName)

@include('components.common.head_livewire')

@include('components.common.header')

@include('components.file_posts.file_posts_index',['masterFileClassification'=>$masterFileClassification,'projectsFileClassification'=>$projectsFileClassification,'masterProject'=>$masterProject,'projectsFileClassifications'=>$projectsFileClassifications,'projectsFilePosts'=>$projectsFilePosts,'masterFileClassifications'=>$masterFileClassifications,'masterFilePosts'=>$masterFilePosts,'teamProjects'=>$teamProjects])

@section('pageJs')
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script type="text/javascript" src="{{asset('js/add_nl2br.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_customFileInput.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_cookie.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_slideShow.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_clientTable.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_filePosts.js')}}"></script>
@endsection

@include('components.common.footer_livewire')

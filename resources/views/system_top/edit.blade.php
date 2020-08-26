@extends('layouts.system_top')

@section('title','要望板返信')

@include('components.common.head')

@include('components.common.header')

@include('components.system_top.system_top_edit',['requestPlate'=>$requestPlate])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

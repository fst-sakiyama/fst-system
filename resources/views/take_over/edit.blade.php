@extends('layouts.system_top')

@section('title','引き継ぎ | 情報修正')

@include('components.common.head')

@include('components.common.header')

@include('components.take_over.take_over_edit',['dispDate'=>$dispDate,'masterClients'=>$masterClients,'masterProjects'=>$masterProjects,'takeOverTheOperation'=>$takeOverTheOperation])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

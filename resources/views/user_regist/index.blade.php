@extends('layouts.system_top')

@section('title','ユーザー一覧')

@include('components.common.head_livewire')

@include('components.common.header')

@include('components.user_regist.user_registration_index',['items'=>$items,'trashItems'=>$trashItems])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<!-- <script type="text/javascript" src="{{asset('js/add_sortable.js')}}"></script> -->
@endsection

@include('components.common.footer_livewire')

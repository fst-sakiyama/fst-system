@extends('layouts.system_top')

@section('title','ユーザー登録')

@include('components.common.head')

@include('components.common.header')

@include('components.user_regist.user_registration_common',['item'=>false,'workingTeams'=>$workingTeams])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

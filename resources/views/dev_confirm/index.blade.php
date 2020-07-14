@extends('layouts.system_top')

@section('title','開発者用進捗確認ページ')

@include('components.common.head')

@include('components.common.header')

@include('components.dev_confirm.dev_confirm_index',['makePlans'=>$makePlans,'nowProgress'=>$nowProgress,'doCompletes'=>$doCompletes,'trashPlans'=>$trashPlans])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

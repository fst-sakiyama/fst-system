@extends('layouts.system_top')

@section('title',$fstSystemPlan->fstSystemPlan)

@include('components.common.head')

@include('components.common.header')

@include('components.progress_detail.progress_detail_index',['fstSystemPlan'=>$fstSystemPlan,'items'=>$items])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

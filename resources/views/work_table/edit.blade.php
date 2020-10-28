@extends('layouts.system_top')

@section('title','勤務表 | 情報修正')

@include('components.common.head_livewire')

@include('components.common.header')

@include('components.work_table.work_table_edit',['userId'=>$userId,'masterShifts'=>$masterShifts,'masterShift'=>$masterShift,'worktable'=>$workTable])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_moveTab.js')}}"></script>
@endsection

@include('components.common.footer_livewire')

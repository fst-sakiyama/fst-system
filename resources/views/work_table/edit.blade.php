@extends('layouts.system_top')

@section('title','勤務表 | 情報修正')

@include('components.common.head_livewire')

@include('components.common.header')

@include('components.work_table.work_table_edit',['nonOpe'=>$nonOpe,'userId'=>$userId,'shiftTableId'=>$shiftTableId,'masterShifts'=>$masterShifts,'masterShift'=>$masterShift,'worktable'=>$workTable,'teamProjects'=>$teamProjects,'workLoads'=>$workLoads])

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_moveTab.js')}}"></script>
<script type="text/javascript" src="{{asset('js/add_work-table_work-load.js')}}"></script>
@endsection

@include('components.common.footer_livewire')

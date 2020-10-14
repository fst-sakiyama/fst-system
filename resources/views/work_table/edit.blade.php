@extends('layouts.system_top')

@section('title','勤務表 | 情報修正')

@include('components.common.head')

@include('components.common.header')

@include('components.work_table.work_table_edit')

@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer')

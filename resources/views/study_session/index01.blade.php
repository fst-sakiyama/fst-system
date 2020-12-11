@extends('layouts.system_top')

@section('title','勉強会')

@include('components.common.head_livewire')

@include('components.common.header')

@section('content')

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnButton')</h1>
    <div class="col">

        テスト
        
    </div>
  </div>
</div>

@endsection



@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer_livewire')

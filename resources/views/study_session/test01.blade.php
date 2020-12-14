@extends('layouts.system_top')

@section('title','勉強会テスト01ページ')

@include('components.common.head_livewire')

@include('components.common.header')

@section('content')

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnButton')</h1>
    <div class="col">

        <table class="table table-sm table-hover" style="width:20%;">
            <thead>
                <tr>
                    <th>姓</th>
                    <th>名</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{$item->firstName}}</td>
                    <td>{{$item->lastName}}</td>
                    <td><button class="btn btn-danger btn-sm p-0" id={{$item->id}}>削除</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
  </div>
</div>

@endsection



@section('pageJs')
<script type="text/javascript" src="{{asset('js/add_jquery.js')}}"></script>
@endsection

@include('components.common.footer_livewire')

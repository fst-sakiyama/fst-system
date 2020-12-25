@section('content')

@php
    function init_value($str1,$str2){
        if(isset($str1)){
            return create_time($str1,$str2);
        } else {
            return '-';
        }
    }

    function create_time($str1,$str2){
        if($str1 === '-' || $str2 === '-'){
            return '-';
        } else {
            return sprintf('%02d',$str1).':'.sprintf('%02d',$str2);
        }
    }

    $weekday = array('日', '月', '火', '水', '木', '金', '土');
    $forHoliday = array('','実施する','中止する','翌平日に実施');
    $regLivePng = array('','live_regular.png','live_transfer.png','live_temporary.png');
    $livePng = array('live_normal.png','live_DVR.png')
@endphp

<div class="contents">
  <div class="container-fluid container-top">
		<h1>@include('components.returnButton')</h1>

        <div class="row">

            @foreach($regLives as $live)
            <div class="col-2">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="row">
                            <div class="col text-left">
                                <img alt='ラベル' src="{{ asset( 'images/'.$regLivePng[$live->classification] ) }}" width="50px">
                                <span class="largeFont">{{ $live->liveShow->regLive->liveName }}</span>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col text-center middleFont">
                                {{ init_value($live->liveShow->startHour,$live->liveShow->startMinute) }} ～
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 small">
                                テスト配信時刻
                            </div>
                            <div class="col-4 text-center">
                                <button id="btn1{{$live->regLivePlanId}}" class="kadomaru btn1">テスト</button>
                                <span class="small txt1"></span>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-8 small">
                                本番開始時刻
                            </div>
                            <div class="col-4 text-center">
                                <button id="btn3{{$live->regLivePlanId}}" class="kadomaru btn3">開始</button>
                                <span class="small txt3"></span>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-8 small">
                                本番終了時刻
                            </div>
                            <div class="col-4 text-center">
                                <button id="btn4{{$live->regLivePlanId}}" class="kadomaru btn4">終了</button>
                                <span class="small txt4"></span>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-8 small">
                                エンコーダ停止時刻
                            </div>
                            <div class="col-4 text-center">
                                <button id="btn5{{$live->regLivePlanId}}" class="kadomaru btn5">停止</button>
                                <span class="small txt5"></span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col p-0">
                                <button id="abnormal{{$live->regLivePlanId}}" class="kadomaru abnormal">異常検知時</button>
                                <span id='last{{$live->regLivePlanId}}'></span>
                            </div>
                            <div class="row mt-1 d-none" id="abnormalBlock{{$live->regLivePlanId}}" name="org">
                                <div class="col-3 timeStamp middleFont"></div>
                                <div class="col-9 textArea">
                                    {{ Form::textarea('abnormal',null,['class'=>'col middleFont abnormalNote form-control','rows'=>2,'name'=>'txtarea'.$live->regLivePlanId.'[]']) }}
                                    <span class="conf middleFont"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-8">
                                <button id="correct{{$live->regLivePlanId}}" class="kadomaru bigSize">修正</button>
                            </div>
                            <div class="col-4">
                                <button id="edit{{$live->regLivePlanId}}" class="kadomaru smallSize">済</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="row mt-3">

            @foreach($items as $item)
            <div class="col-2">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="row">
                            <div class="col text-right">
                                <small>issueNo：{{$item->issueNo}}</small>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col text-left">
                                <img alt='ラベル' src="{{ asset( 'images/'.$livePng[$item->dvr] ) }}" width="60px">
                                {{ $item->liveName }}
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col text-center">
                                {{ init_value($item->startHour,$item->startMinute) }} ～ {{ init_value($item->endHour,$item->endMinute) }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        ボディ
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</div>

@endsection

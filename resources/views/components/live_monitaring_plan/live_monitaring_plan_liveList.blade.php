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

    function RegConfTime($liveId,$workId){
        $res = App\Models\RegLiveResult::where('regLivePlanId',$liveId)->where('liveWorkId',$workId)->first();
        if($res){
            return substr($res->confTime,0,5);
        }else{
            return '';
        }
    }

    function confTime($liveId,$workId){
        $res = App\Models\LiveResult::where('livePlanId',$liveId)->where('liveWorkId',$workId)->first();
        if($res){
            return substr($res->confTime,0,5);
        }else{
            return '';
        }
    }

    function RegAbnormal($liveId){
        $res = App\Models\RegLiveAbnormalCondition::where('regLivePlanId',$liveId)->orderBy('confTime')->get();
        return $res;
    }

    function Abnormal($liveId){
        $res = App\Models\LiveAbnormalCondition::where('livePlanId',$liveId)->orderBy('confTime')->get();
        return $res;
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
            <div id="cardReg{{$live->regLivePlanId}}" class="col-2">
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
                                @php $res = regConfTime($live->regLivePlanId,1); @endphp
                                @if($res)
                                <span class="small btnReg{{$live->regLivePlanId}}">{{$res}}</span>
                                @else
                                <button id="btn1Reg{{$live->regLivePlanId}}" class="kadomaru btn1">テスト</button>
                                <span class="small txt1 btnReg{{$live->regLivePlanId}}"></span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-8 small">
                                本番開始時刻
                            </div>
                            <div class="col-4 text-center">
                                @php $res = regConfTime($live->regLivePlanId,3); @endphp
                                @if($res)
                                <span class="small btnReg{{$live->regLivePlanId}}">{{$res}}</span>
                                @else
                                <button id="btn3Reg{{$live->regLivePlanId}}" class="kadomaru btn3">開始</button>
                                <span class="small txt3 btnReg{{$live->regLivePlanId}}"></span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-8 small">
                                本番終了時刻
                            </div>
                            <div class="col-4 text-center">
                                @php $res = regConfTime($live->regLivePlanId,4); @endphp
                                @if($res)
                                <span class="small btnReg{{$live->regLivePlanId}}">{{$res}}</span>
                                @else
                                <button id="btn4Reg{{$live->regLivePlanId}}" class="kadomaru btn4">終了</button>
                                <span class="small txt4 btnReg{{$live->regLivePlanId}}"></span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-8 small">
                                エンコーダ停止時刻
                            </div>
                            <div class="col-4 text-center">
                                @php $res = regConfTime($live->regLivePlanId,5); @endphp
                                @if($res)
                                <span class="small btnReg{{$live->regLivePlanId}}">{{$res}}</span>
                                @else
                                <button id="btn5Reg{{$live->regLivePlanId}}" class="kadomaru btn5">停止</button>
                                <span class="small txt5 btnReg{{$live->regLivePlanId}}"></span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col p-0">
                                <button id="abnormalReg{{$live->regLivePlanId}}" class="kadomaru abnormal">異常検知時</button>
                                @php $res = RegAbnormal($live->regLivePlanId); @endphp
                                @if($res)
                                    <div class="row mt-1">
                                    @foreach($res as $re)
                                        <div class="col-3 middleFont">{{substr($re->confTime,0,5)}}</div>
                                        <div class="col-9 middleFont">{!! nl2br(e($re->stateContent)) !!}</div>
                                    @endforeach
                                    </div>
                                @endif
                                <span id='lastReg{{$live->regLivePlanId}}'></span>
                            </div>
                            <div class="row mt-1 d-none" id="abnormalBlockReg{{$live->regLivePlanId}}" name="org">
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
                                <a href="{{route('live_monitaring_plan.regLiveCorrect',['regId'=>$live->regLivePlanId])}}">
                                    <button id="correctReg{{$live->regLivePlanId}}" class="kadomaru bigSize">修正</button>
                                </a>
                            </div>
                            <div class="col-4">
                                <button id="editReg{{$live->regLivePlanId}}" class="kadomaru smallSize">済</button>
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
                                <img alt='ラベル' src="{{ asset( 'images/'.$livePng[$item->dvr] ) }}" width="50px">
                                <span class="largeFont">{{ $item->liveName }}</span>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col text-center middleFont">
                                {{ init_value($item->startHour,$item->startMinute) }} ～ {{ init_value($item->endHour,$item->endMinute) }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 small">
                                テスト配信時刻
                            </div>
                            <div class="col-4 text-center">
                                @php $res = confTime($item->livePlanId,1); @endphp
                                @if($res)
                                <span class="small">{{$res}}</span>
                                @else
                                <button id="btn1{{$item->livePlanId}}" class="kadomaru btn1">テスト</button>
                                <span class="small txt1"></span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-8 small">
                                リフレッシュ時刻
                            </div>
                            <div class="col-4 text-center">
                                @php $res = confTime($item->livePlanId,2); @endphp
                                @if($res)
                                <span class="small">{{$res}}</span>
                                @else
                                <button id="btn4{{$item->livePlanId}}" class="kadomaru btn4">開始</button>
                                <span class="small txt4"></span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-8 small">
                                本番開始時刻
                            </div>
                            <div class="col-4 text-center">
                                @php $res = confTime($item->livePlanId,3); @endphp
                                @if($res)
                                <span class="small">{{$res}}</span>
                                @else
                                <button id="btn3{{$item->livePlanId}}" class="kadomaru btn3">開始</button>
                                <span class="small txt3"></span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-8 small">
                                本番終了時刻
                            </div>
                            <div class="col-4 text-center">
                                @php $res = confTime($item->livePlanId,4); @endphp
                                @if($res)
                                <span class="small">{{$res}}</span>
                                @else
                                <button id="btn4{{$item->livePlanId}}" class="kadomaru btn4">終了</button>
                                <span class="small txt4"></span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-8 small">
                                エンコーダ停止時刻
                            </div>
                            <div class="col-4 text-center">
                                @php $res = confTime($item->livePlanId,5); @endphp
                                @if($res)
                                <span class="small">{{$res}}</span>
                                @else
                                <button id="btn5{{$item->livePlanId}}" class="kadomaru btn5">停止</button>
                                <span class="small txt5"></span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col p-0">
                                <button id="abnormal{{$item->livePlanId}}" class="kadomaru abnormal">異常検知時</button>
                                @php $res = Abnormal($item->livePlanId); @endphp
                                @if($res)
                                    <div class="row mt-1">
                                    @foreach($res as $re)
                                        <div class="col-3 middleFont">{{substr($re->confTime,0,5)}}</div>
                                        <div class="col-9 middleFont">{!! nl2br(e($re->stateContent)) !!}</div>
                                    @endforeach
                                    </div>
                                @endif
                                <span id='last{{$item->livePlanId}}'></span>
                            </div>
                            <div class="row mt-1 d-none" id="abnormalBlock{{$item->livePlanId}}" name="org">
                                <div class="col-3 timeStamp middleFont"></div>
                                <div class="col-9 textArea">
                                    {{ Form::textarea('abnormal',null,['class'=>'col middleFont abnormalNote form-control','rows'=>2,'name'=>'txtarea'.$item->livePlanId.'[]']) }}
                                    <span class="conf middleFont"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-8">
                                <button id="correct{{$item->livePlanId}}" class="kadomaru bigSize">修正</button>
                            </div>
                            <div class="col-4">
                                <button id="edit{{$item->livePlanId}}" class="kadomaru smallSize">済</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</div>

@endsection

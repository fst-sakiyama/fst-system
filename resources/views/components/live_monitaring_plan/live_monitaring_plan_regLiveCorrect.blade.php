@section('content')

@php
    $regLive = App\Models\RegLivePlan::find($regId);
    $regAbnormal = App\Models\RegLiveAbnormalCondition::where('regLivePlanId',$regId)->orderBy('confTime')->get();

    function regConfTime($regId,$workId)
    {
        $res = App\Models\RegLiveResult::where('regLivePlanId',$regId)->where('liveWorkId',$workId)->first();
        if($res){
            return substr($res->confTime,0,5);
        }else{
            return '';
        }
    }

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

    $regLivePng = array('','live_regular.png','live_transfer.png','live_temporary.png');
    $livePng = array('live_normal.png','live_DVR.png')
@endphp

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnLinkButton',['item'=>'/live_monitaring_plan/live_list'])</h1>

        <div class="row">

            <div class="card w-50 mx-auto">
                <div class="card-header">
                    <div class="row">
                        <div class="col text-left">
                            <img alt='ラベル' src="{{ asset( 'images/'.$regLivePng[$regLive->classification] ) }}" width="50px">
                            <span class="largeFont">{{ $regLive->liveShow->regLive->liveName }}</span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col text-center middleFont">
                            {{ init_value($regLive->liveShow->startHour,$regLive->liveShow->startMinute) }} ～
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8 small">
                            テスト配信時刻
                        </div>
                        <div class="col-4 text-center">
                            @php $res = regConfTime($regId,1); @endphp
                            @if($res)
                                {{ Form::time('test',$res,['class'=>'form-control form-control-sm']) }}
                            @else
                                {{ Form::time('test',null,['class'=>'form-control form-control-sm']) }}
                            @endif
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-8 small">
                            本番開始時刻
                        </div>
                        <div class="col-4 text-center">
                            @php $res = regConfTime($regId,3); @endphp
                            @if($res)
                                {{ Form::time('test',$res,['class'=>'form-control form-control-sm']) }}
                            @else
                                {{ Form::time('test',null,['class'=>'form-control form-control-sm']) }}
                            @endif
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-8 small">
                            本番終了時刻
                        </div>
                        <div class="col-4 text-center">
                            @php $res = regConfTime($regId,4); @endphp
                            @if($res)
                                {{ Form::time('test',$res,['class'=>'form-control form-control-sm']) }}
                            @else
                                {{ Form::time('test',null,['class'=>'form-control form-control-sm']) }}
                            @endif
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-8 small">
                            エンコーダ停止時刻
                        </div>
                        <div class="col-4 text-center">
                            @php $res = regConfTime($regId,5); @endphp
                            @if($res)
                                {{ Form::time('test',$res,['class'=>'form-control form-control-sm']) }}
                            @else
                                {{ Form::time('test',null,['class'=>'form-control form-control-sm']) }}
                            @endif
                        </div>
                    </div>
                    @if($regAbnormal)
                        @foreach($regAbnormal as $re)
                        <div class="row mt-2">
                            <div class="form-group form-inline">
                                {{ Form::time('test',$re->confTime,['class'=>'form-control form-control-sm']) }}
                                {{ Form::textarea('textarea',$re->stateContent,['class'=>'form-control form-control-sm ml-2','rows'=>'2'])}}
                                <button class="btn btn-outline-primary btn-sm p-0 ml-3">修正</button>
                                <button class="btn btn-outline-danger btn-sm p-0 ml-2">削除</button>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-8">
                            <button class="kadomaru bigSize">修正</button>
                        </div>
                        <div class="col-4">
                            <button class="kadomaru smallSize">済</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection

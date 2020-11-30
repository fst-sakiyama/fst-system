<div>
    <td>{{ Form::checkbox('dispPaidLeave',1,$dispPaidleave,['class'=>'custom-controller','id'=>'dispPaidLeave'.$userId])}}</td>
    <td>{{ $name }}</td>
    <td>
        <div id="grantDateBlock{{$userId}}" class="">
            {{ $grantDate }}
        </div>
        <div id="grantDateFormBlock{{$userId}}" class="form-group form-inline d-none">
            {{ Form::date('grantDate',$grantDate,['id'=>'grantDate'.$userId,'class'=>'form-control-sm custom-control','min'=>$minDate]) }}
        </div>
    </td>
    <td>
        <button class="btn btn-sm btn-success py-0" id='correct{{$userId}}'>修正</button>
        <button class="btn btn-sm btn-warning py-0 d-none" id='edit{{$userId}}'>実行</button>
    </td>
</div>

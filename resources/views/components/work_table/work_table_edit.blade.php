@section('content')
@php
  $date = new Carbon\Carbon($workTable->workDay);
  $week = array( "日", "月", "火", "水", "木", "金", "土" );
  $d = $date->format('Y年m月d日');
  $w = '('.$week[$date->dayOfWeek].')';
@endphp

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">{{$d.$w}} -勤務情報の編集</h5>
        {{ Form::open(['route'=>'work_table.store']) }}
        {{ Form::hidden('workDay',$workTable->workDay )}}
        {{ Form::hidden('userId',$workTable->userId) }}


            <livewire:work-table :workTable=$workTable :masterShift=$masterShift>


            <div class="card-footer">
              <div class="form-group text-center">
                {{ Form::button('編集を登録する',['class'=>'btn btn-primary','type'=>'submit']) }}
                {{ Form::close() }}
              </div>
            </div>

      </div>
    </div>
  </div>
</div>

@endsection

@section('content')

@php
if(empty($takeOverTheOperation->wellKnown)){
  $key = false;
} else {
  $key = true;
}
@endphp

<div class="contents">
  <div class="container mt-3">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">引き継ぎ・周知事項の修正</h5>
        <div class="card-body">
          <div class="mt-3">
            {{ Form::open(array('route' => array('take_over.update', $takeOverTheOperation->takeOverId), 'method' => 'PUT')) }}
            {{ Form::hidden('dispDate',$dispDate) }}
            {{ Form::hidden('takeOverId',$takeOverTheOperation->takeOverId) }}
            <div class="form-group mt-3 form-inline">
              {{ Form::label('clientId','顧客名',['class'=>'col-md-2']) }}
              <select class="parent form-control col-md-6" name="clientId">
                <option value="" selected="selected">---顧客名を選択してください---</option>
                @foreach($masterClients as $item)
                  @empty(!($item->projects()->first()))
                    <option value="{{ $item->clientId }}" @if($takeOverTheOperation->project->clientId ==$item->clientId || old('clientId')==$item->clientId) selected @endif>{{ $item->clientName }}</option>
                  @endempty
                @endforeach
              </select>
            </div>

            <div class="form-group mt-3 form-inline">
              {{ Form::label('projectId','案件名',['class'=>'col-md-2']) }}
              <select class="children form-control col-md-6" name='projectId' disabled>
                <option value="" selected="selected">---案件名を選択してください---</option>
                @foreach($masterProjects as $item)
                  <option value="{{ $item->projectId }}" data-val="{{ $item->clientId }}" @if($takeOverTheOperation->project->projectId ==$item->projectId || old('projectId')==$item->projectId) selected @endif>{{ $item->projectName }}</option>
                @endforeach
              </select>
              @error('projectId')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group mt-3 form-inline">
              {{ Form::label('takeOverContent','引き継ぎ内容',['class'=>'col-md-2']) }}
              {{ Form::textarea('takeOverContent',str_replace('&lt;br&gt;', '<br>', htmlspecialchars($takeOverTheOperation->takeOverContent)),['placeholder'=>'引き継ぎ内容を入力','class'=>'col-md-6','id'=>'takeOverContent']) }}
              @error('takeOverContent')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group mt-3 form-inline">
              {{ Form::label('timeLimit','期限',['class'=>'col-md-2']) }}
              {{ Form::date('timeLimit',$takeOverTheOperation->timeLimit,['class'=>'col-md-6','id'=>'timeLimit']) }}
            </div>

            <div class="form-group mt-5 form-inline justify-content-center">
              {{ Form::checkbox('wellKnown',\Carbon\Carbon::now(),$key,['id'=>'check-id','class'=>'circle','style'=>'transform:scale(1.5)']) }}
              {{ Form::label('check-id','周知事項に入れる',['class'=>'form-check-label ml-3']) }}
            </div>

          </div>
        </div>
        <div class="card-footer">
          <div class="form-group text-center">
            {{ Form::submit('修正',['class'=>'w-25 btn btn-primary']) }}
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

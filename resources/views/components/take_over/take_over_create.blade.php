@section('content')

<div class="contents">
  <div class="container mt-3">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">引き継ぎ・周知事項の作成</h5>
        <div class="card-body">
          <div class="mt-3">
            {{ Form::open(['route'=>'take_over.store']) }}
            {{ Form::hidden('dispDate',$dispDate) }}
            
            <div class="form-group mt-3 form-inline">
              {{ Form::label('clientId','顧客名',['class'=>'col-md-2']) }}
              <select class="parent form-control col-md-6" name="clientId">
                <option value="" selected="selected">---顧客名を選択してください---</option>
                @foreach($masterClients as $item)
                  @empty(!($item->projects()->first()))
                    <option value="{{ $item->clientId }}" @if(old('clientId')==$item->clientId) selected @endif>{{ $item->clientName }}</option>
                  @endempty
                @endforeach
              </select>
            </div>

            <div class="form-group mt-3 form-inline">
              {{ Form::label('projectId','案件名',['class'=>'col-md-2']) }}
              <select class="children form-control col-md-6" name='projectId' disabled>
                <option value="" selected="selected">---案件名を選択してください---</option>
                @foreach($masterProjects as $item)
                  <option value="{{ $item->projectId }}" data-val="{{ $item->clientId }}" @if(old('projectId')==$item->projectId) selected @endif>{{ $item->projectName }}</option>
                @endforeach
              </select>
              @error('projectId')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group mt-3 form-inline">
              {{ Form::label('takeOverContent','引き継ぎ内容',['class'=>'col-md-2']) }}
              {{ Form::textarea('takeOverContent',null,['placeholder'=>'引き継ぎ内容を入力','class'=>'col-md-6','id'=>'takeOverContent']) }}
              @error('takeOverContent')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group mt-3 form-inline">
              {{ Form::label('timeLimit','期限',['class'=>'col-md-2']) }}
              {{ Form::date('timeLimit',null,['class'=>'col-md-6','id'=>'timeLimit']) }}
            </div>

            <div class="form-group mt-5 form-inline justify-content-center">
              {{ Form::checkbox('wellKnown',\Carbon\Carbon::now(),false,['id'=>'check-id','class'=>'circle','style'=>'transform:scale(1.5)']) }}
              {{ Form::label('check-id','周知事項に入れる',['class'=>'form-check-label ml-3']) }}
            </div>

          </div>
        </div>
        <div class="card-footer">
          <div class="form-group text-center">
            {{ Form::submit('新規登録',['class'=>'w-25 btn btn-primary']) }}
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

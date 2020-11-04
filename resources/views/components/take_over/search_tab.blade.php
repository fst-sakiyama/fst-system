<div class="card-body">
  <div class="mt-3">
    {{ Form::open(['route'=>'search_result.search','target'=>'fstSystemSearchResult']) }}

    <div class="form-group mt-3 form-inline">
      {{ Form::label('searchPeriod','検索期間',['class'=>'col-md-2']) }}
      {{ Form::date('searchStart',null,['class'=>'col-md-2','id'=>'searchStart']) }}
      <span>　～　</span>
      {{ Form::date('searchEnd',null,['class'=>'col-md-2','id'=>'searchEnd']) }}
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('clientId','顧客名',['class'=>'col-md-2']) }}
      <select class="parent form-control col-md-6" name="clientId">
        <option value="" selected="selected">---顧客名を選択してください---</option>
        @foreach($masterClients as $item)
          <option value="{{ $item->clientId }}" @if(old('clientId')==$item->clientId) selected @endif>{{ $item->clientName }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('projectId','案件名',['class'=>'col-md-2']) }}
      <select class="children form-control col-md-6" name='projectId' disabled>
        <option value="" selected="selected">---案件名を選択してください---</option>
        @foreach($masterProjects as $item)
          <option value="{{ $item->teamProjectId }}" data-val="{{ $item->clientId }}" @if(old('projectId')==$item->projectId) selected @endif>{{ $item->projectName }}</option>
        @endforeach
      </select>
      @error('projectId')
        <span class="ml-2 text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('takeOverKeyWord','検索キーワード',['class'=>'col-md-2']) }}
      {{ Form::text('takeOverKeyWord',null,['placeholder'=>'検索キーワード','class'=>'col-md-6','id'=>'takeOverKeyWord']) }}
      @error('takeOverContent')
        <span class="ml-2 text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-group mt-5 form-inline">
      {{ Form::label('','',['class'=>'col-md-2']) }}
      {{ Form::checkbox('takeOver',\Carbon\Carbon::now(),true,['id'=>'takeOver-id','class'=>'circle','style'=>'transform:scale(1.5)']) }}
      {{ Form::label('takeOver-id','引き継ぎ事項を検索対象とする',['class'=>'form-check-label ml-3']) }}
    </div>

    <div class="form-group mt-3 form-inline">
      {{ Form::label('','',['class'=>'col-md-2']) }}
      {{ Form::checkbox('wellKnown',\Carbon\Carbon::now(),true,['id'=>'wellKnown-id','class'=>'circle','style'=>'transform:scale(1.5)']) }}
      {{ Form::label('wellKnown-id','周知事項を検索対象とする',['class'=>'form-check-label ml-3']) }}
    </div>

    <div class="form-group mt-5 form-inline">
      {{ Form::submit('検索を行う',['class'=>'w-50 btn btn-primary mr-5 ml-5']) }}
      {{ Form::button('リセット',['class'=>'w-25 btn btn-warning searchReset'])}}
    </div>

    {{ Form::close() }}
  </div>
</div>

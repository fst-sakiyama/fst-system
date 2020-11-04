@section('content')

@php
if(empty($takeOverTheOperation->wellKnown)){
  $key = false;
} else {
  $key = true;
}
@endphp

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">引き継ぎ・周知事項の修正</h5>
        <div class="card-body">
          <div class="mt-3">
            {{ Form::open(array('route' => array('take_over.update', $takeOverTheOperation->takeOverId), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}
            {{ Form::hidden('dispDate',$dispDate,['class'=>'dispDate']) }}
            {{ Form::hidden('takeOverId',$takeOverTheOperation->takeOverId) }}
            <div class="form-group mt-3 form-inline">
              {{ Form::label('clientId','顧客名',['class'=>'col-md-2']) }}
              <span class="badge badge-danger mr-1">※必須</span>
              <select class="parent form-control col-md-6" name="clientId">
                <option value="" selected="selected">---顧客名を選択してください---</option>
                @foreach($masterClients as $item)
                  <option value="{{ $item->clientId }}" @if($takeOverTheOperation->project->project->clientId ==$item->clientId || old('clientId')==$item->clientId) selected @endif>{{ $item->clientName }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group mt-3 form-inline">
              {{ Form::label('projectId','案件名',['class'=>'col-md-2']) }}
              <span class="badge badge-danger mr-1">※必須</span>
              <select class="children form-control col-md-6" name='projectId' @if(empty($takeOverTheOperation->project->clientId) && empty(old('clientId'))) disabled @endif>
                <option value=""  @if(empty($takeOverTheOperation->project->project->clientId) && empty(old('clientId'))) selected @endif>---案件名を選択してください---</option>
                @foreach($masterProjects as $item)
                  <option value="{{ $item->teamProjectId }}" data-val="{{ $item->clientId }}" @if($takeOverTheOperation->project->project->projectId ==$item->projectId || old('projectId')==$item->projectId) selected @endif>{{ $item->project->projectName }}</option>
                @endforeach
              </select>
              @error('projectId')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group mt-3 form-inline">
              {{ Form::label('takeOverContent','引き継ぎ内容',['class'=>'col-md-2']) }}
              <span class="badge badge-danger mr-1">※必須</span>
              {{ Form::textarea('takeOverContent',str_replace('&lt;br&gt;', '<br>', htmlspecialchars($takeOverTheOperation->takeOverContent)),['placeholder'=>'引き継ぎ内容を入力','class'=>'col-md-6','id'=>'takeOverContent']) }}
              @error('takeOverContent')
                <span class="ml-2 text-danger">{{ $message }}</span>
              @enderror
            </div>



            @if(count($takeOverTheOperation->files)>0)
            <div class="mt-5">
              @foreach($takeOverTheOperation->files as $file)
                <div class="form-group mt-3 form-inline">
                  {{ Form::label('addFilePost'.$file->addFilePostId,'添付ファイル',['class'=>'col-md-2']) }}
                  <span class="badge badge-success mr-1">保存済</span>
                  {{ $file->fileName }}　　　
                  {{ Form::button('<<削除',['class' => 'btn btn-danger btn-sm filedel','data-id'=>$file->addFilePostId]) }}
                </div>
              @endforeach
            </div>
            @endif



            <div class="form-group mt-5 form-inline">
              {{ Form::label('filePosts','添付ファイル',['class'=>'col-md-2']) }}
              <span class="badge badge-primary mr-1">空白可</span>
              <div class="input-group col-md-6">
                  <div class="custom-file">
                      {{ Form::file('file',['class'=>'custom-file-input','id'=>'customFile','multiple'=>'multiple','name'=>'files[]']) }}
                      {{ Form::label('file','ファイル選択...複数選択可',['class'=>'custom-file-label','for'=>'customFile','data-browse'=>'参照']) }}
                  </div>
                  <div class="input-group-append">
                      {{ Form::button('取消',['class'=>'btn btn-outline-secondary reset']) }}
                  </div>
              </div>
            </div>



            @if(count($takeOverTheOperation->links)>0)
            <div class="mt-5">
              @foreach($takeOverTheOperation->links as $link)
                <div class="form-group mt-3 form-inline">
                  {{ Form::label('referenceLink'.$link->linkId,'参考URL',['class'=>'col-md-2']) }}
                  <span class="badge badge-success mr-1">登録済</span>
                  @empty($link->remarks)
                    {{ $link->referenceLinkURL }}　　　
                  @else
                    {{ $link->remarks }}　　　
                  @endempty
                  {{ Form::button('<<削除',['class' => 'btn btn-danger btn-sm linkdel','data-id'=>$link->linkId]) }}
                </div>
              @endforeach
            </div>
            @endif



            <div class="mt-5">
              <div class="box" data-boxno="0">
                <div class="form-group mt-4 form-inline">
                  {{ Form::label('referenceLinkURL','参考URL',['class'=>'col-md-2']) }}
                  <span class="badge badge-primary mr-1">空白可</span>
                  {{ Form::url('referenceLinkURL','',['placeholder'=>'参考URLを入力','class'=>'col-md-6 linkURL','name'=>'referenceLinkURL[0]']) }}
                </div>
                <div class="form-group mt-3 form-inline">
                  {{ Form::label('remarks','説明',['class'=>'col-md-2']) }}
                  <span class="badge badge-primary mr-1">空白可</span>
                  {{ Form::text('remarks','',['placeholder'=>'参考URLの説明を入力','class'=>'col-md-6 remarks','name'=>'remarks[0]']) }}
                  {{ Form::button('削除',['class'=>'btn btn-danger btn-sm ml-2 delete-box']) }}
                </div>
              </div>
              <div class="form-group mt-3">
                {{ Form::button('追加',['class'=>'btn btn-success col-md-6 btn-sm mx-auto btn-block add-box'])}}
              </div>
            </div>

            <div class="form-group mt-5 form-inline">
              {{ Form::label('timeLimit','期限',['class'=>'col-md-2']) }}
              <span class="badge badge-primary mr-1">空白可</span>
              {{ Form::date('timeLimit',$takeOverTheOperation->timeLimit,['class'=>'col-md-6','id'=>'timeLimit']) }}
            </div>

            <div class="form-group mt-5 form-inline">
              {{ Form::label('','',['class'=>'col-md-2']) }}
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

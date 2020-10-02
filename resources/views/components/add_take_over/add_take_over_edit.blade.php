@section('content')

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">【追記】引き継ぎ・周知事項の修正</h5>
        <div class="card-body">
          {{ Form::open(array('route' => array('add_take_over.update', $addId), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}
          {{ Form::hidden('dispDate',$dispDate,['class'=>'dispDate']) }}
          {{ Form::hidden('takeOverId',$takeOverTheOperation->takeOverId) }}
          {{ Form::hidden('projectId',$takeOverTheOperation->projectId) }}
          <div class="row mt-2">
            @include('components.add_take_over.temp_take_over_card',['takeOverTheOperation'=>$takeOverTheOperation])

            @foreach($takeOverTheOperation->takeOverTheOperations()->get() as $item)
              @if($item->addTakeOverId == $addId)
              <div class="card mt-3 mx-auto">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group mt-2">
                        {{ Form::textarea('addTakeOverContent',str_replace('&lt;br&gt;', '<br>', htmlspecialchars($item->addTakeOverContent)),['placeholder'=>'【追記】引き継ぎ内容を入力※認証が出来るまでは記入した人の名前を入れること','class'=>'mt-2','id'=>'addTakeOverContent','size'=>'40x14']) }}
                        @error('addTakeOverContent')
                          <span class="ml-2 text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="col-md-7">
                    @if(count($item->files)>0)
                      @foreach($item->files as $file)
                        <div class="form-group mt-3 form-inline">
                          {{ Form::label('addFilePost'.$file->addFilePostId,'添付ファイル',['class'=>'col-md-2']) }}
                          <span class="badge badge-success mr-1">保存済</span>
                          {{ $file->fileName }}　　　
                          {{ Form::button('<<削除',['class' => 'btn btn-danger btn-sm filedel','data-id'=>$file->addFilePostId]) }}
                        </div>
                      @endforeach
                    @endif

                    <div class="form-group mt-5 form-inline">
                      {{ Form::label('filePosts','添付ファイル',['class'=>'col-md-2']) }}
                      <div class="input-group">
                          <div class="custom-file">
                              {{ Form::file('file',['class'=>'custom-file-input','id'=>'customFile','multiple'=>'multiple','name'=>'files[]']) }}
                              {{ Form::label('file','ファイル選択...複数選択可',['class'=>'custom-file-label','for'=>'customFile','data-browse'=>'参照']) }}
                          </div>
                          <div class="input-group-append">
                              {{ Form::button('取消',['class'=>'btn btn-outline-secondary reset']) }}
                          </div>
                      </div>
                    </div>


                      @if(count($item->links)>0)
                      <div class="mt-5">
                        @foreach($item->links as $link)
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
                            {{ Form::url('referenceLinkURL','',['placeholder'=>'参考URLを入力','class'=>'col-md-8 linkURL','name'=>'referenceLinkURL[0]']) }}
                          </div>
                          <div class="form-group mt-3 form-inline">
                            {{ Form::label('remarks','説明',['class'=>'col-md-2']) }}
                            {{ Form::text('remarks','',['placeholder'=>'参考URLの説明を入力','class'=>'col-md-8 remarks','name'=>'remarks[0]']) }}
                            {{ Form::button('削除',['class'=>'btn btn-danger btn-sm ml-2 delete-box']) }}
                          </div>
                        </div>
                        <div class="form-group mt-3">
                          {{ Form::button('追加',['class'=>'btn btn-success col-md-6 btn-sm mx-auto btn-block add-box'])}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="form-group text-center">
                    {{ Form::submit('【追記】修正',['class'=>'w-25 btn btn-primary']) }}
                  </div>
                  {{ Form::close() }}
                </div>
              </div>
              @else
                @include('components.add_take_over.temp_add_take_over_card',['item'=>$item])
              @endif
            @endforeach
          </div>
        </div>



        <div class="card-footer">

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('content')

<div class="contents">
  <div class="container mt-3">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">【追記】引き継ぎ・周知事項の作成</h5>
        <div class="card-body">
          {{ Form::open(['route'=>'add_take_over.store','enctype'=>'multipart/form-data']) }}
          {{ Form::hidden('dispDate',$dispDate) }}
          {{ Form::hidden('takeOverId',$takeOverTheOperation->takeOverId)}}
          {{ Form::hidden('projectId',$takeOverTheOperation->projectId)}}
          <div class="row mt-2">
            @include('components.add_take_over.temp_take_over_card',['takeOverTheOperation'=>$takeOverTheOperation])

            @foreach($takeOverTheOperation->takeOverTheOperations()->get() as $item)
              @include('components.add_take_over.temp_add_take_over_card',['item'=>$item])
            @endforeach
          </div>

          <div class="row mt-3">
            <div class="col-md-5">
              <div class="form-group mt-2">
                {{ Form::label('addTakeOverContent','追記',['class'=>'col-md-2']) }}
                {{ Form::textarea('addTakeOverContent',null,['placeholder'=>'【追記】引き継ぎ内容を入力※認証が出来るまでは記入した人の名前を入れること','class'=>'mt-2','id'=>'addTakeOverContent','size'=>'40x14']) }}
                @error('addTakeOverContent')
                  <span class="ml-2 text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="col-md-7">
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

        <div class="card-footer">
          <div class="form-group text-center">
            {{ Form::submit('【追記】登録',['class'=>'w-25 btn btn-primary']) }}
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

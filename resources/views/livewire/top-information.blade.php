<div class="card">
  <h5 class="card-header">インフォメーション修正</h5>
  <div class="card-body">
    <div class="mt-3">
      {{ Form::open(['route'=>array('top_information.update',$item->id),'method'=>'PUT','files'=>true]) }}
      {{ Form::hidden('infoId',$infoId,['wire:model'=>'infoId']) }}

      <div class="form-group mt-3 form-inline">
        {{ Form::label('classification','分類',['class'=>'col-md-2']) }}
        {{ Form::select('classification',Config::get('array.informations'),$item->classification,['class'=>'custom-select custom-select-sm','wire:model'=>'classification']) }}
      </div>

      <div class="form-group mt-3 form-inline">
        {{ Form::label('information','表示内容',['class'=>'col-md-2']) }}
        {{ Form::textarea('information',$item->information,['class'=>'form-control col-md-6','rows'=>3,'required']) }}
      </div>

      @if($disabled)
        <div class="form-group mt-5 form-inline">
          {{ Form::label('filePosts','添付ファイル',['class'=>'col-md-2']) }}
          <span class="ml-1">{{ $item->fileName }}</span>
          {{Form::button('削除',['class' => 'btn btn-danger btn-sm ml-3','onclick'=>"return confirm('本当に削除して良いですか？')",'wire:click'=>'onClick'])}}
        </div>
      @else
        <div class="form-group mt-5 form-inline">
          {{ Form::label('filePosts','添付ファイル',['class'=>'col-md-2']) }}
          <div class="input-group col-md-6">
              <div class="custom-file">
                  {{ Form::file('file',['class'=>'custom-file-input','id'=>'customFile','name'=>'file','required']) }}
                  {{ Form::label('file','ファイル選択...',['class'=>'custom-file-label','for'=>'customFile','data-browse'=>'参照']) }}
              </div>
              <div class="input-group-append">
                  {{ Form::button('取消',['class'=>'btn btn-outline-secondary reset']) }}
              </div>
          </div>
        </div>
      @endif

    </div>
  </div>
  <div class="card-footer">
    <div class="form-group text-center">
      {{ Form::submit('修正',['class'=>'w-25 btn btn-primary']) }}
    </div>
    {{ Form::close() }}
  </div>
</div>

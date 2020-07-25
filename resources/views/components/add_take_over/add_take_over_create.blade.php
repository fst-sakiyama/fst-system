@section('content')

<div class="contents">
  <div class="container mt-3">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">【追記】引き継ぎ・周知事項の作成</h5>
        <div class="card-body">
          {{ Form::open(['route'=>'add_take_over.store']) }}
          {{ Form::hidden('dispDate',$dispDate) }}
          {{ Form::hidden('takeOverId',$takeOverTheOperation->takeOverId)}}
        <div class="row mt-2">
          @include('components.add_take_over.temp_take_over_card',['takeOverTheOperation'=>$takeOverTheOperation])

          @foreach($takeOverTheOperation->takeOverTheOperations()->get() as $item)
            @include('components.add_take_over.temp_add_take_over_card',['item'=>$item])
          @endforeach

          <div class="form-group col-sm-4">
            {{ Form::textarea('addTakeOverContent',null,['placeholder'=>'【追記】引き継ぎ内容を入力※認証が出来るまでは記入した人の名前を入れること','class'=>'mt-2','id'=>'addTakeOverContent','size'=>'40x14']) }}
            @error('addTakeOverContent')
              <span class="ml-2 text-danger">{{ $message }}</span>
            @enderror
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

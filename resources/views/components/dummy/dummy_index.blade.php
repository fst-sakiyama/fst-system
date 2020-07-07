@section('content')

<div class="contents">
  <div class="container mt-3">
    <div class="col">
      <div class="card">
        <div class="card-body">

          {{ Form::open(['route'=>'dummy.store']) }}

          <div class="col mt-3">
            {{ Form::select('clientId',$masterClientsLoop,null,['placeholder'=>'---顧客名を選択してください---','class'=>'parent col-md-6']) }}
          </div>

          <div class="col mt-3">
            <select class="children col-md-6" name='projectId' disabled>
              <option value="" selected="selected">---案件名を選択してください---</option>
              @foreach($masterProjects as $item)
                <option value="{{ $item->projectId }}" data-val="{{ $item->clientId }}">{{ $item->projectName }}</option>
              @endforeach
            </select>
          </div>

          {{ Form::close() }}

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

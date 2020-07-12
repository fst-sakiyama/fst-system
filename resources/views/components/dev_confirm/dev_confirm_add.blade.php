@section('content')

<div class="contents">
  <div class="container mt-3">
    <h1>@include('components.returnLinkButton',['item'=>'/dev_confirm'])</h1>
    <div class="col">
      <div class="card">
        <h5 class="card-header">課題の登録</h5>
        <div class="mt-3">
          {{ Form::open(['route'=>'dev_confirm.add','method'=>'post']) }}
          <!--
          <form action="/dev_confirm/add" method="post">
          {{csrf_field()}}
          -->
          <div class="form-group">
            {{ Form::label('fstSystemPlan','課題',['class'=>'col-md-2']) }}
            <span class="mr-2">：</span>
            {{ Form::text('fstSystemPlan',null,['placeholder'=>'課題','class'=>'col-md-4','id'=>'fstSystemPlan']) }}
            @error('fstSystemPlan')
              <span class="ml-2 text-danger">{{ $message }}</span>
            @enderror
          </div>
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

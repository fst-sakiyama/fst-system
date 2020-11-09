@section('content')

@php
  $i=1;
  $length = count($teamProjects);
@endphp

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">

        <div class="card-header">
          <div class="row">
            <div class="col-md">
              <h5>{{ $masterProject->client->clientName }}　様<br>{{ $masterProject->projectName }}</h5>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <ul class="nav nav-tabs nav-pills" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="item-tab" data-toggle="tab" href="#item" role="tab" aria-controls="item">
                  <img class="" alt="総合" src="{{ asset('images/synthesize.png') }}" width="70px">
                </a>
              </li>
              @foreach($teamProjects as $teamProject)
              <li class="nav-item">
                <a class="nav-link" id="item{{$teamProject->teamProjectId}}-tab" data-toggle="tab" href="#item{{$teamProject->teamProjectId}}" role="tab" aria-controls="item{{$teamProject->teamProjectId}}">
                  <img class="" alt="{{ $teamProject->workingTeam->workingTeam }}" src="{{ asset( 'images/'.$teamProject->workingTeam->workingTeamImage ) }}" width="70px">
                </a>
              </li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="tab-content" id="myTab-content">

          <div class="tab-pane fade show active" id="item" role="tabpanel" aria-labelledby="item-tab">
            <div class="row">
              <div class="col">

                <div class="card">
                  <div class="card-body">

                    @if(session()->has('message'))
                        <div class="alert alert-danger mb-3">
                            {{session('message')}}
                        </div>
                    @endif

                    {{ Form::button('ファイルの追加フォームを開く',['class'=>'slideButton btn btn-outline-info btn-sm','data-id'=>'0','style'=>'cursor:pointer;']) }}
                    <div class="slideBlock0 mt-4" style="display:none;">
                      {{ Form::open(['route'=>'file_posts.store','enctype'=>'multipart/form-data']) }}
                        {{ Form::hidden('projectId',$masterProject->projectId) }}

                        <div class="form-group">
                          {{ Form::label('fileClassificationId','種別',['class'=>'col-md-2 col-form-label']) }}
                          {{ Form::select('fileClassificationId',$projectsFileClassification,null,['placeholder'=>'---ファイル種別を選択してください---','class'=>'col-md-6 custom-select'])}}
                          @error('fileClassificationId')
                            <span class="ml-2 text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group form-inline">
                          {{ Form::label('filePosts','ファイル',['class'=>'col-md-2 col-form-label']) }}
                          <div class="input-group">
                              <div class="custom-file">
                                  {{ Form::file('masterFile',['class'=>'custom-file-input','id'=>'customFile','multiple'=>'multiple','name'=>'files[]']) }}
                                  {{ Form::label('masterFile','ファイル選択...複数選択可',['class'=>'custom-file-label','for'=>'customFile','data-browse'=>'参照']) }}
                              </div>
                              <div class="input-group-append">
                                  {{ Form::button('取消',['class'=>'btn btn-outline-secondary reset']) }}
                              </div>
                          </div>
                        </div>

                        <div class="form-group text-center">
                          {{ Form::submit('新規登録',['class'=>'w-25 btn btn-primary btn-sm']) }}
                        </div>

                      {{ Form::close() }}
                    </div>
                  </div>

                  <table class="table table-sm table-hover">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>

        @foreach($teamProjects as $teamProject)
          <div class="tab-pane fade" id="item{{$teamProject->teamProjectId}}" role="tabpanel" aria-labelledby="item{{$teamProject->teamProjectId}}-tab">
            <div class="row">
              <div class="col">

                <div class="card">
                  <div class="card-body">

                    @if(session()->has('message'))
                        <div class="alert alert-danger mb-3">
                            {{session('message')}}
                        </div>
                    @endif

                    {{ Form::button('ファイルの追加フォームを開く',['class'=>'slideButton btn btn-outline-info btn-sm','data-id'=>$teamProject->teamProjectId,'style'=>'cursor:pointer;']) }}
                    <div class="slideBlock{{$teamProject->teamProjectId}} mt-4" style="display:none;">
                      {{ Form::open(['route'=>'file_posts.store','enctype'=>'multipart/form-data']) }}
                        {{ Form::hidden('teamProjectId',$teamProject->teamProjectId) }}

                        {{ $teamProject->project_detail }}
                        <div class="form-group">
                          <!-- $teamProject->teamProjectIdを取得 -->
                          {{ Form::label('fileClassificationId','種別',['class'=>'col-md-2 col-form-label']) }}
                          {{ Form::select('fileClassificationId',$masterFileClassification,null,['placeholder'=>'---ファイル種別を選択してください---','class'=>'col-md-6 custom-select'])}}
                          @error('fileClassificationId')
                            <span class="ml-2 text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group form-inline">
                          {{ Form::label('filePosts','ファイル',['class'=>'col-md-2 col-form-label']) }}
                          <div class="input-group">
                              <div class="custom-file">
                                  {{ Form::file('projectFile',['class'=>'custom-file-input','id'=>'customFile','multiple'=>'multiple','name'=>'files[]']) }}
                                  {{ Form::label('projectFile','ファイル選択...複数選択可',['class'=>'custom-file-label','for'=>'customFile','data-browse'=>'参照']) }}
                              </div>
                              <div class="input-group-append">
                                  {{ Form::button('取消',['class'=>'btn btn-outline-secondary reset']) }}
                              </div>
                              @error('files')
                                <span class="ml-2 text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                        </div>

                        <div class="form-group text-center">
                          {{ Form::submit('新規登録',['class'=>'w-25 btn btn-primary btn-sm']) }}
                        </div>

                      {{ Form::close() }}
                    </div>
                  </div>

                  <table class="table table-sm table-hover">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
        @endforeach

      </div>
      {{ Form::close() }}

        <div class="card-footer d-flex justify-content-center align-middle">
          テスト
        </div>



      </div>
    </div>
  </div>
</div>

@endsection

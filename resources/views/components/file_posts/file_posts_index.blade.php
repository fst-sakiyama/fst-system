@section('content')

@php
  $i=1;
  $length = count($projectsFilePosts);
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
          <!-- 総合ページ -->
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

                        <div class="form-group form-inline">
                          {{ Form::label('fileClassificationId','フォルダ',['class'=>'col-md-2 col-form-label']) }}
                          {{ Form::select('fileClassificationId',$projectsFileClassification,null,['placeholder'=>'---フォルダ---','class'=>'col-md-2 custom-select'])}}
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
                                  {{ Form::button('取消',['class'=>'btn btn-outline-secondary','id'=>'inputFileReset']) }}
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
                        <th style="width:60%">ファイル名</th>
                        <th style="width:25%">最終更新日</th>
                        <th style="width:15%">最終更新者</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($projectsFileClassifications as $items)
                        @php $i=1; $x=$items->projectsFileClassificationId; @endphp
                        @foreach($projectsFilePosts[$x][0] as $item)
                          @if($i===1)
                            @php $var = $projectsFilePosts[$x][1]; @endphp
                            <tr {{ $var===0 ? '' : 'data-link='.$x }} style="{{ $var===0 ? '' : 'cursor:pointer;' }}" class="{{ $var===0 ? 'table-secondary' : 'table-success' }}">
                              <td class="h5">
                                {{ $items->fileClassification }}
                              </td>
                              <td class="small">
                                @if($projectsFilePosts[$items->projectsFileClassificationId][1] !== 0)
                                最終更新日：{{ $projectsFilePosts[$items->projectsFileClassificationId][2] }}
                                @endif
                              </td>
                              <td class="small">
                                ファイル数：{{ $projectsFilePosts[$items->projectsFileClassificationId][1] }}
                              </td>
                            </tr>
                          @endif
                          @if($item->fileName)
                            <tr class="slideRow{{ $x }} d-none">
                              <td style="width:60%">{{ $item->fileName }}</td>
                              <td style="width:25%">{{ $item->updated_at }}</td>
                              <td style="width:15%">{{ App\User::find($item->updated_by)->name }}</td>
                            </tr>
                          @endif
                          @php $i++; @endphp
                        @endforeach
                      @endforeach
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>

        <!-- 各チームのページ -->
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
                        <div class="form-group form-inline">
                          {{ Form::label('fileClassificationId','フォルダ',['class'=>'col-md-2 col-form-label']) }}
                          {{ Form::select('fileClassificationId',$masterFileClassification,null,['placeholder'=>'---フォルダ---','class'=>'col-md-2 custom-select'])}}
                          @error('fileClassificationId')
                            <span class="ml-2 text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group form-inline">
                          {{ Form::label('filePosts','ファイル',['class'=>'col-md-2 col-form-label']) }}
                          <div class="input-group">
                              <div class="custom-file">
                                  {{ Form::file('projectFile',['class'=>'custom-file-input','id'=>'customFile'.$teamProject->teamProjectId,'multiple'=>'multiple','name'=>'files[]']) }}
                                  {{ Form::label('projectFile','ファイル選択...複数選択可',['class'=>'custom-file-label customFile'.$teamProject->teamProjectId,'for'=>'customFile'.$teamProject->teamProjectId,'data-browse'=>'参照']) }}
                              </div>
                              <div class="input-group-append">
                                  {{ Form::button('取消',['class'=>'btn btn-outline-secondary','id'=>'inputFileReset'.$teamProject->teamProjectId]) }}
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

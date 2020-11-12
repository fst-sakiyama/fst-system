@section('content')

@php
  $i=1;
  $length = count($projectsFilePosts);
  $projectId = $masterProject->projectId;
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
                    <div class="row mb-1">
                      <div class="col">
                        @if($masterProject->project_detail)
                          {!! nl2br(e($masterProject->project_detail)) !!}
                        @else
                          案件の詳細情報が登録されておりません。
                        @endif
                      </div>
                    </div>

                    <div id='pr_messageFolder{{$masterProject->projectId}}' class="row my-1 d-none">
                      <div class="col">
                        <div class="alert alert-danger mb-3">
                          ※フォルダを選択してください。
                        </div>
                      </div>
                    </div>

                    <div id='pr_messageFile{{$masterProject->projectId}}' class="row my-1 d-none">
                      <div class="col">
                        <div class="alert alert-danger mb-3">
                          ※ファイルを一つ以上選択してください。
                        </div>
                      </div>
                    </div>

                    <div class="row mt-4 ml-3">
                      <div class="col">
                        {{ Form::button('ファイルの追加フォームを開く',['class'=>'slideButton btn btn-outline-info btn-sm','data-id'=>'0','style'=>'cursor:pointer;']) }}
                        <div class="slideBlock0 mt-4" style="display:none;">
                          {{ Form::open(['route'=>'file_posts.store','enctype'=>'multipart/form-data']) }}
                            {{ Form::hidden('projectId',$masterProject->projectId) }}

                            <div class="form-group form-inline">
                              {{ Form::label('fileClassificationId','フォルダ',['class'=>'col-md-2 col-form-label']) }}
                              {{ Form::select('fileClassificationId',$projectsFileClassification,null,['placeholder'=>'---フォルダ---','class'=>'col-md-2 custom-select','id'=>'pr_folder'.$masterProject->projectId])}}
                              @error('fileClassificationId')
                                <span class="ml-2 text-danger">{{ $message }}</span>
                              @enderror
                            </div>

                            <div class="form-group form-inline">
                              {{ Form::label('filePosts','ファイル',['class'=>'col-md-2 col-form-label']) }}
                              <div class="input-group">
                                  <div class="custom-file">
                                      {{ Form::file('masterFile',['class'=>'custom-file-input','id'=>'pr_customFile'.$masterProject->projectId,'multiple'=>'multiple','name'=>'files[]']) }}
                                      {{ Form::label('masterFile','ファイル選択...複数選択可',['class'=>'custom-file-label pr_label'.$masterProject->projectId,'for'=>'pr_customFile'.$masterProject->projectId,'data-browse'=>'参照']) }}
                                  </div>
                                  <div class="input-group-append">
                                      {{ Form::button('取消',['class'=>'btn btn-outline-secondary','id'=>'pr_inputFileReset'.$masterProject->projectId]) }}
                                  </div>
                              </div>
                            </div>

                            <div id='pr_submit{{$masterProject->projectId}}' class="form-group text-center">
                              {{ Form::button('新規登録',['class'=>'w-25 btn btn-primary btn-sm','type'=>'submit']) }}
                            </div>

                          {{ Form::close() }}
                        </div>
                      </div>
                    </div>
                  </div>

                  <table class="table table-sm table-hover">
                    <thead>
                      <tr>
                        <th style="width:50%">ファイル名</th>
                        <th style="width:18%">作成日</th>
                        <th style="width:18%">最終更新日</th>
                        <th style="width:14%">最終更新者</th>
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
                                <i class="fas fa-folder"></i><span class="ml-2">{{ $items->fileClassification }}</span>
                              </td>
                              <td class="small text-right pr-5" colspan="2">
                                @if($projectsFilePosts[$x][1] !== 0)
                                最終更新日：{{ $projectsFilePosts[$x][2] }}
                                @endif
                              </td>
                              <td class="small">
                                ファイル数：{{ $projectsFilePosts[$x][1] }}
                              </td>
                            </tr>
                          @endif
                          @if($item->fileName)
                            @php $projectsFilePostId = $item->projectsFilePostId; @endphp
                            <tr class="slideRow{{ $x }} d-none" data-href="{{ route('file_projectsFileShow.projectsFileShow',['id'=>$projectsFilePostId]) }}" style="cursor:pointer;">

                              <livewire:projects-file-posts :item=$item :id=$projectsFilePostId :projectId=$projectId>

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
          @php $teamProjectId = $teamProject->teamProjectId; @endphp
          <div class="tab-pane fade" id="item{{$teamProject->teamProjectId}}" role="tabpanel" aria-labelledby="item{{$teamProject->teamProjectId}}-tab">
            <div class="row">
              <div class="col">

                <div class="card">
                  <div class="card-body">
                    <div class="row mb-1">
                      <div class="col">
                        @if($teamProject->project_detail)
                          {!! nl2br(e($teamProject->project_detail)) !!}
                        @else
                          案件の詳細情報が登録されておりません。
                        @endif
                      </div>
                    </div>

                    <div id='messageFolder{{$teamProject->teamProjectId}}' class="row my-1 d-none">
                      <div class="col">
                        <div class="alert alert-danger mb-3">
                          ※フォルダを選択してください。
                        </div>
                      </div>
                    </div>


                    <div id='messageFile{{$teamProject->teamProjectId}}' class="row my-1 d-none">
                      <div class="col">
                        <div class="alert alert-danger mb-3">
                          ※ファイルを一つ以上選択してください。
                        </div>
                      </div>
                    </div>

                    <div class="row mt-4 ml-3">
                      <div class="col">
                        {{ Form::button('ファイルの追加フォームを開く',['class'=>'slideButton btn btn-outline-info btn-sm','data-id'=>$teamProject->teamProjectId,'style'=>'cursor:pointer;']) }}
                        <div class="slideBlock{{$teamProject->teamProjectId}} mt-4" style="display:none;">
                          {{ Form::open(['route'=>'file_posts.store','enctype'=>'multipart/form-data']) }}
                            {{ Form::hidden('teamProjectId',$teamProjectId) }}

                            {{ $teamProject->project_detail }}
                            <div class="form-group form-inline">
                              {{ Form::label('fileClassificationId','フォルダ',['class'=>'col-md-2 col-form-label']) }}
                              {{ Form::select('fileClassificationId',$masterFileClassification,null,['placeholder'=>'---フォルダ---','class'=>'col-md-2 custom-select','id'=>'folder'.$teamProject->teamProjectId])}}
                              @error('fileClassificationId')
                                <span class="ml-2 text-danger">{{ $message }}</span>
                              @enderror
                            </div>

                            <div class="form-group form-inline">
                              {{ Form::label('filePosts','ファイル',['class'=>'col-md-2 col-form-label']) }}
                              <div class="input-group">
                                  <div class="custom-file">
                                      {{ Form::file('projectFile',['class'=>'custom-file-input','id'=>'customFile'.$teamProject->teamProjectId,'multiple'=>'multiple','name'=>'files[]']) }}
                                      {{ Form::label('projectFile','ファイル選択...複数選択可',['class'=>'custom-file-label label'.$teamProject->teamProjectId,'for'=>'customFile'.$teamProject->teamProjectId,'data-browse'=>'参照']) }}
                                  </div>
                                  <div class="input-group-append">
                                      {{ Form::button('取消',['class'=>'btn btn-outline-secondary','id'=>'inputFileReset'.$teamProject->teamProjectId]) }}
                                  </div>
                              </div>
                            </div>

                            <div id='submit{{$teamProject->teamProjectId}}' class="form-group text-center">
                              {{ Form::button('新規登録',['class'=>'w-25 btn btn-primary btn-sm','type'=>'submit']) }}
                            </div>

                          {{ Form::close() }}
                        </div>
                      </div>
                    </div>
                  </div>

                  <table class="table table-sm table-hover">
                    <thead>
                      <tr>
                        <th style="width:50%">ファイル名</th>
                        <th style="width:18%">作成日</th>
                        <th style="width:18%">最終更新日</th>
                        <th style="width:14%">最終更新者</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($masterFileClassifications as $items)
                        @php $i=1; $x=$items->fileClassificationId; @endphp
                        @foreach($masterFilePosts[$teamProjectId][$x][0] as $item)
                          @if($i===1)
                            @php $var = $masterFilePosts[$teamProjectId][$x][1]; @endphp
                            <tr {{ $var===0 ? '' : 'data-link='.$x }} style="{{ $var===0 ? '' : 'cursor:pointer;' }}" class="{{ $var===0 ? 'table-secondary' : 'table-success' }}">
                              <td class="h5">
                                <i class="fas fa-folder"></i><span class="ml-2">{{ $items->fileClassification }}</span>
                              </td>
                              <td class="small text-right pr-5" colspan="2">
                                @if($masterFilePosts[$teamProjectId][$x][1] !== 0)
                                最終更新日：{{ $masterFilePosts[$teamProjectId][$x][2] }}
                                @endif
                              </td>
                              <td class="small">
                                ファイル数：{{ $masterFilePosts[$teamProjectId][$x][1] }}
                              </td>
                            </tr>
                          @endif
                          @if($item->fileName)
                            @php $filePostId = $item->filePostId; @endphp
                            <tr class="slideRow{{ $x }} d-none" data-href="{{ route('file_show.show',['id'=>$filePostId]) }}" style="cursor:pointer;">

                              <livewire:file-posts :item=$item :id=$filePostId :projectId=$projectId>

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
        @endforeach

      </div>
      {{ Form::close() }}

        <div class="card-footer d-flex justify-content-center align-middle">
          {{ $masterProject->projectName }}
        </div>



      </div>
    </div>
  </div>
</div>

@endsection

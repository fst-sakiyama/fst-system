@section('content')
<div class="contents">
  <div class="container container-top">
    <div class="row">
      <div class="col">
        <h1>@include('components.returnLinkButton',['item'=>'/system_top'])</h1>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md">
                <h5>ユーザー一覧</h5>
              </div>
              <div class="col-md text-right">
                <a href="{{asset('/user_regist/create')}}"><button type="button" class="w-50 btn btn-primary">ユーザー | 新規登録</button></a>
              </div>
            </div>
          </div>


          <table class="table table-hover">
            <thead>
              <tr>
                <th>勤務表</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>権限名</th>
                <th>最終ログイン</th>
                <th>修正</th>
                @can('admin-higher')
                  <th>リセット</th>
                @endcan
                @can('system-only')
                  <th>削除</th>
                @endcan
              </tr>
            </thead>
            <tbody id="sort-able">
              @foreach($items as $item)
                @if($item->role != '1')

                <tr id="{{$item->id}}">
                  <td>
                      <a href="{{ route('work_table.index',['uid'=>$item->id]) }}"><div class="btn btn-sm btn-primary py-0">勤務表</div></a><br>
                      <a href="{{ route('work_load.index',['uid'=>$item->id]) }}"><div class="btn btn-sm btn-secondary py-0 mt-1">工数表</div></a>
                  </td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->master_role->roleName }}</td>
                  <td>
                    @empty(!($item->last_login_at))
                      {{ $item->last_login_at->format('Y年m月d日 H時i分') }}
                    @endempty
                  </td>
                  <td><a href="{{ route('user.edit',$item->id) }}" class="btn btn-success btn-sm py-0"><i class="fas fa-edit"></i> 修正</a></td>
                  @can('admin-higher')
                    <td>
                      {{ Form::open(array('route' => array('user.password_reset', $item->id), 'method' => 'POST')) }}
                      {{ Form::submit('リセット',['class'=>'btn btn-sm btn-warning py-0','onclick'=>"return confirm('パスワードをリセットしてもよろしいですか？')"]) }}
                      {{ Form::close() }}
                    </td>
                  @endcan
                  @can('system-only')
                    <td>
                      <form action="{{ route('user.destroy', $item->id) }}" id="form_{{ $item->id }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <a href="#" data-id="{{ $item->id }}" class="btn btn-danger deleteConf btn-sm py-0"><i class="fas fa-trash-alt"></i> 削除</a>
                      </form>
                    </td>
                  @endcan
                </tr>

                @endif
              @endforeach
            </tbody>
          </table>

          <div class="card-footer d-flex justify-content-center align-middle">

          </div>
        </div>
      </div>
    </div>

    @can('system-only')
    <div class="row mt-5">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md">
                <h5>削除済みユーザー一覧</h5>
              </div>
            </div>
          </div>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>権限名</th>
                <th>最終ログイン</th>
                <th>修正</th>
                <th>削除</th>
              </tr>
            </thead>
            <tbody>
              @foreach($trashItems as $item)
              <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->master_role->roleName }}</td>
                <td>
                  @empty(!($item->last_login_at))
                    {{ $item->last_login_at->format('Y年m月d日 H時i分') }}
                  @endempty
                </td>
                <td><a href="{{ route('user.restore',$item->id) }}" class="btn btn-success btn-sm">戻す</a></td>
                <td>
                  <form action="{{ route('user.forceDelete', $item->id) }}" id="form_{{ $item->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <a href="#" data-id="{{ $item->id }}" class="btn btn-danger deleteConf btn-sm">完全削除</a>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="card-footer d-flex justify-content-center align-middle">

          </div>
        </div>
      </div>
    </div>
    @endcan
  </div>
</div>
@endsection

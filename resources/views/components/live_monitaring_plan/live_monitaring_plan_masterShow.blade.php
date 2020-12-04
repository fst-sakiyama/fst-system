@section('content')

@php
    function init_value($str1,$str2){
        if(isset($str1)){
            return create_time($str1,$str2);
        } else {
            return '-';
        }
    }

    function create_time($str1,$str2){
        if($str1 === '-' || $str2 === '-'){
            return '-';
        } else {
            return sprintf('%02d',$str1).':'.sprintf('%02d',$str2);
        }
    }
@endphp

<div class="contents">
  <div class="container container-top">
		<h1>@include('components.returnButton')</h1>

        <div class="row">
            <div class="col">
              <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-10">
                                <h5>定例ライブ一覧</h5>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('live_monitaring_plan.masterCreate') }}">
                                    <button class="btn btn-sm btn-primary py-0">新規作成</button>
                                </a>
                            </div>
                        </div>
                    </div>

                  <table class="table table-sm table-hover">
                      <thead>
                          <tr>
                              <th>ラベル</th>
                              <th>開催日</th>
                              <th>開始時刻</th>
                              <th>ライブ名</th>
                          </tr>
                      </thead>
                      <tbody>
                          @if($items)
                          @foreach($items as $item)
                          <tr>
                              <td>{{ $item->classification }}</td>
                              <td>{{ $item->eventDay->format('Y-m-d') }}</td>
                              <td>{{ init_value($item->liveShow->startHour,$item->liveShow->startMinute) }}</td>
                              <td>{{ $item->liveName }}</td>
                          </tr>
                          @endforeach
                          @endif
                      </tbody>
                  </table>
              </div>
            </div>
        </div>

@endsection

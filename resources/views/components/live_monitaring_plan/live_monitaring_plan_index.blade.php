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
    <div class="col">
      <div class="card">
          <div class="card-header">
              <h5>ライブ予定</h5>
          </div>
          <table class="table table-sm table-hover">
              <thead>
                  <tr>
                      <th>dvr</th>
                      <th>issueNo</th>
                      <th>開催日</th>
                      <th>開始時刻</th>
                      <th>終了時刻</th>
                      <th>ライブ名</th>
                      <th>特記事項</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($items as $item)
                  <tr>
                      <td>{{ $item->dvr == 1 ? 'あり' : '' }}</td>
                      <td>{{ $item->issueNo ? $item->issueNo : 'なし'}}</td>
                      <td>{{ $item->eventDay->format('Y-m-d') }}</td>
                      <td>{{ init_value($item->startHour,$item->startMinute) }}</td>
                      <td>{{ init_value($item->endHour,$item->endMinute) }}</td>
                      <td>{{ $item->liveName }}</td>
                      <td>{{ $item->specialNote ? $item->specialNote : '' }}</td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

@endsection

@section('content')

@php
    function table_class($dt,$int){
        if($int >= 10){ return '';}
        $today = \Carbon\Carbon::today();
        $future = $dt->copy()->addYear()->subDay();
        $diff = $today->diffInDays($future);
        if($diff <= 30){
            return 'table-danger';
        }elseif($diff <= 60){
            return 'table-warning';
        }elseif($diff <= 90){
            return 'table-info';
        }else{
            return '';
        }
    }
@endphp

<div class="contents">
  <div class="container container-top">
    <h1>@include('components.returnButton')</h1>
    <div class="col">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col h5">
                    有給取得確認
                </div>
                <div class="col text-right">
                    <a href="{{route('paid_leave.create')}}"><div class="btn btn-sm btn-primary">取得日の更新</div></a>
                </div>
            </div>
        </div>

        <table class="table table-sm">
          <thead>
            <tr>
              <th style="width:20%;">名前</th>
              <th style="width:30%;">有給付与日</th>
              <th style="width:50%;">有給消化状況</th>
            </tr>
          </thead>
          <tbody>
            @foreach($items as $item)
              @if($item->role != '1' && isset($item->dispPaidLeave))
                @php $id = $item->userId; @endphp
                <tr>
                    <td rowspan="2">{{ $item->employee->name }}</td>
                    <td>{{ isset($paidLeave[$id][0]) ? $paidLeave[$id][0]->format('Y-m-d') : '-' }}</td>
                    <td>
                        @if(isset($paidLeave[$id][1]))
                            <div class="thumbnails">
                            @for($i = 1; $i <= $paidLeave[$id][1]; $i++)
                                @if($i % 2 == 0)
                                    <img class="thumbnail" alt="取得済" src="{{ asset('images/color_right.png') }}" height="26px">
                                @else
                                    <img class="thumbnail" alt="取得済" src="{{ asset('images/color_left.png') }}" height="26px">
                                @endif
                            @endfor
                            @for($i = $paidLeave[$id][1] + 1; $i <= 10; $i++)
                                @if($i % 2 == 0)
                                    <img class="thumbnail" alt="未取得" src="{{ asset('images/mono_right.png') }}" height="26px">
                                @else
                                    <img class="thumbnail" alt="未取得" src="{{ asset('images/mono_left.png') }}" height="26px">
                                @endif
                            @endfor
                            </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    @php $class = isset($paidLeave[$id][2]) ? table_class($paidLeave[$id][2],$paidLeave[$id][3]) : '' ; @endphp
                    <td class='{{ $class }}'>{{ isset($paidLeave[$id][2]) ? $paidLeave[$id][2]->format('Y-m-d') : '-' }}</td>
                    <td class='{{ $class }}'>
                        @if(isset($paidLeave[$id][3]))
                            <div class="thumbnails">
                            @for($i = 1; $i <= $paidLeave[$id][3]; $i++)
                                @if($i % 2 == 0)
                                    <img class="thumbnail" alt="取得済" src="{{ asset('images/color_right.png') }}" height="26px">
                                @else
                                    <img class="thumbnail" alt="取得済" src="{{ asset('images/color_left.png') }}" height="26px">
                                @endif
                            @endfor
                            @for($i = $paidLeave[$id][3] + 1; $i <= 10; $i++)
                                @if($i % 2 == 0)
                                    <img class="thumbnail" alt="未取得" src="{{ asset('images/mono_right.png') }}" height="26px">
                                @else
                                    <img class="thumbnail" alt="未取得" src="{{ asset('images/mono_left.png') }}" height="26px">
                                @endif
                            @endfor
                            </div>
                        @endif
                    </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>

@endsection

@section('content')

@php
  $currentMonth = 5;
  $nowd = strtotime(date("Y-m-d"));

@endphp

<div class="contents">
  <div class="container container-top">

テスト中

<table class="table table-bordered">
  <thead>
    <tr>
    @foreach ($calendar->weekday() as $dayOfWeek)
    <th>{{ $dayOfWeek }}</th>
    @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach ($dates as $date)
    @if ($date->dayOfWeek == 0)
    <tr>
    @endif
    <td
    @if ($date->month != $disp->month)
    class="bg-secondary"
    @elseif($holidays[$date->timestamp])
    class="{{$holidays[$date->timestamp]}}"
    @endif
    >
    @php
    dump($cnt[$date->timestamp]);
    dump($calendar->weekday()[$date->dayOfWeek]);
    @endphp
    {{ $date->day }}
    </td>
    @if ($date->dayOfWeek == 6)
    </tr>
    @endif
    @endforeach
  </tbody>
</table>

  </div>
</div>

@endsection

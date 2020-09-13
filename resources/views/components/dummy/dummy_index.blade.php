@section('content')

@php
  $currentMonth = 9;
  $nowd = strtotime(date("Y-m-d"));
  $weekday = ['日', '月', '火', '水', '木', '金', '土'];
@endphp

<div class="contents">
  <div class="container mt-3">

<table class="table table-bordered">
  <thead>
    <tr>
    @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
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
    @if ($date->month != $currentMonth)
    class="bg-secondary"
    @endif
    >
    @php
    $dt = new Carbon\Carbon($date);
    dump($dt->timestamp);
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

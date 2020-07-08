@section('content')

@php
  $currentMonth = 6;
  $nowd = strtotime(date("Y-m-d"));
@endphp

<div class="contents">
  <div class="container mt-3">
    <div class="col">
      <div class="card">
        <div class="card-body">

          {{ Form::open(['route'=>'dummy.store']) }}

          <div class="form-group mt-3">
            <select class="parent form-control col-6" name="clientId">
              <option value="" selected="selected">---顧客名を選択してください---</option>
              @foreach($masterClients as $item)
                @empty(!($item->projects()->first()))
                  <option value="{{ $item->clientId }}">{{ $item->clientName }}</option>
                @endempty
              @endforeach
            </select>
          </div>

          <div class="form-group mt-3">
            <select class="children form-control col-6" name='projectId' disabled>
              <option value="" selected="selected">---案件名を選択してください---</option>
              @foreach($masterProjects as $item)
                <option value="{{ $item->projectId }}" data-val="{{ $item->clientId }}">{{ $item->projectName }}</option>
              @endforeach
            </select>
          </div>

          {{ Form::close() }}

        </div>
      </div>
    </div>

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
    @if(strtotime($date)==$nowd)
      @php dd(date("Y-m-d",strtotime($date))); @endphp
    @endif
    @if ($date->dayOfWeek == 0)
    <tr>
    @endif
    <td
    @if ($date->month != $currentMonth)
    class="bg-secondary"
    @endif
    >
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
